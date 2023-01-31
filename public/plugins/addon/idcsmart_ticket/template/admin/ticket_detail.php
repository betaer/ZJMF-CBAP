<link rel="stylesheet" href="/plugins/addon/idcsmart_ticket/template/admin/css/order.css" />
<link rel="stylesheet" href="/plugins/addon/idcsmart_ticket/template/admin/css/common/viewer.min.css">
<!-- =======内容区域======= -->
<div id="content" class="template" v-cloak>
  <t-loading attach="#content" size="small" :loading="pageLoading"></t-loading>
  <div class="detail-box" ref="scrollDiv">
    <div class="top-box">
      <t-divider class="reply-divider" align="left">{{lang.order_detail}}</t-divider>
      <div class="top-title">
        <div class="ticket-title">{{orderDetailData.ticket_num}}-{{orderDetailData.title}}</div>
        <div class="ticket-info">
          <span class="info-title" @click="goUserPagr">{{lang.order_text18}}：<span class="blue-text">{{orderDetailData.username}}</span></span>
          <span class="info-title">{{lang.order_text19}}：<span class="info-item">{{ orderDetailData.create_time ? formatDate(orderDetailData.create_time) : '--'}}</span></span>
          <span class="info-title">{{lang.order_text20}}：<span class="info-item">{{orderDetailData.distanceTime}}</span></span>
          <span class="log-btn" @click="handelLog">{{lang.order_text21}}</span>
        </div>
      </div>
      <div class="select-box">
        <div>
          <span>{{lang.order_text22}}：</span>
          <t-select class="select-240" @change="hostChange" :min-collapsed-num="1" clearable multiple :placeholder="lang.order_text24" clearable v-model="params.selectHostList" :options="hostList" :keys="{ label: 'showName', value: 'id'}" :scroll="{ type: 'virtual' }" :popup-props="{ overlayStyle: { height: '300px' } }"></t-select>
        </div>
        <div>
          <span>{{lang.order_text65}}：</span>
          <t-select class="select-240" :placeholder="lang.please_search_order_type" clearable v-model="params.ticket_type" :keys="{ label: 'name', value: 'id' }" :options="orderTypeList"></t-select>
        </div>
        <div>
          <span>{{lang.order_text25}}：</span>
          <t-select class="select-240 no-mar" :placeholder="lang.please_search_order_status" clearable v-model="params.status" :keys="{ label: 'name', value: 'id'}" :options="order_status_options"></t-select>
        </div>
        <div class="save-btn">
          <t-button @click="handelEditOrderStatus">{{lang.order_text13}}</t-button>
        </div>
      </div>
    </div>
    <div class="bottom-box">
      <t-divider class="reply-divider" align="left">{{lang.order_text26}}</t-divider>
      <t-list class="reply-list">
        <t-list-item v-for="(item, index) in replyList" :key="index">
          <div class="reply-item">
            <div class="reply-top" v-if="orderDetailData.post_admin_id > 0 && item.id == 0">
              <span class="reply-user red-text">{{lang.order_text28 }}</span>
              <span class="user-name">{{item.type === 'Client' ? item.client_name : item.type === 'Admin' ?  item.admin_name : item.name ? item.name : '--'}}</span>
            </div>
            <div class="reply-top" v-else>
              <span class="reply-user" :class="item.type === 'Client' ? 'green-text' : item.type === 'Admin' ? 'red-text' : 'pink-text'">{{item.type === 'Client' ? lang.order_text27 : item.type === 'Admin' ? lang.order_text28 : lang.order_text29 }}</span>
              <span class="user-name">{{item.type === 'Client' ? item.client_name : item.type === 'Admin' ?  item.admin_name : item.name ? item.name : '--'}}</span>
            </div>
            <div class="reply-main">
              <div class="reply-middle" :class="item.type === 'Client' ? 'green-bg' : item.type === 'Admin' ? 'blue-bg' : 'pink-bg'" @mouseover="mouseOver(item)" @mouseleave="mouseLeave(item)">
                <div v-html="item.content" @click="hanldeImage($event)" class="replu-conten"></div>
                <div class="text-btn" v-show="item.isShowBtn && item.id != 0">
                  <t-button shape="circle" class="edit-btn" variant="text" @click="editItem(item)">
                    <t-icon name="edit-1" size="small" style="color:#1862DC" />
                  </t-button>
                  <t-button shape="circle" variant="text" @click="deleteItem(item)">
                    <t-icon name="delete" size="small" style="color:#FF0000" />
                  </t-button>
                </div>
              </div>
              <div class="reply-bottom">
                <div v-if="item.attachment && item.attachment.length > 0">
                  <div class="reply-list-attachment-item" v-for="(f,i) in item.attachment" :key="i" @click="downloadfile(f,f.split('^')[1])">
                    <span :title="f.split('^')[1]">
                      <t-icon name="file-paste" size="small" style="color:#9696A3"></t-icon>{{f.split('^')[1]}}
                    </span>
                  </div>
                </div>
              </div>
              <div class="time-div"><span>{{formatDate(item.create_time)}}</span></div>
            </div>
          </div>
        </t-list-item>
    </div>
    </t-list>
    <div class="relply-input">
      <textarea id="tiny" name="content" v-model="replyData"></textarea>
    </div>
    <div class="btn-box">
      <div>
        <t-button class="add-btn" @click="addNotes" v-show="!isAddNotes && !isEditing">{{lang.order_text30}}</t-button>
        <t-button class="re-btn" v-show="!isAddNotes" @click="replayVisible = true">{{lang.order_text31}}</t-button>
      </div>
      <div v-if="isEditing">
        <t-button class="ok-btn" @click="handelEdit" :loading="editLoding">{{lang.order_text32}}</t-button>
        <t-button theme="default" class="canle-btn" @click="cancelEdit">{{lang.order_text33}}</t-button>
      </div>
      <div v-else-if="isAddNotes">
        <t-button class="ok-btn" @click="handelAddNotes" :loading="addNotesLing">{{lang.order_text30}}</t-button>
        <t-button theme="default" class="canle-btn" @click="cancelAddNotes">{{lang.order_text33}}</t-button>
      </div>
      <div v-else>
        <t-button class="send-btn" @click="submitReply" :loading="sendLoading">{{lang.order_text34}}</t-button>
        <t-button theme="default" @click="goList">{{lang.order_text35}}</t-button>
      </div>
    </div>
  </div>
  <!-- 删除弹窗 -->
  <t-dialog :visible.sync="deleteVisible" :header="lang.order_text36" :body="lang.order_text37" @confirm="handelDelete" @close="deleteVisible = false"></t-dialog>
  <!-- 日志记录弹窗 -->
  <t-dialog :header="lang.order_text21" placement="center" :visible.sync="logVisible" width="800" :footer="false">
    <t-table :pagination="pagination" @page-change="onPageChange" row-key="index" :data="logList" :columns="columns">
      <template #description="slotProps">
        <div class="description-box" v-html="slotProps.row.description"></div>
      </template>
      <template #create_time="slotProps">
        <div>{{formatDate(slotProps.row.create_time)}}</div>
      </template>
    </t-table>
  </t-dialog>
  <!-- 预设回复弹窗 -->
  <t-dialog :header="lang.order_text38" :placement="top" :close-btn="false" :confirm-btn="null" :top="'20%'" :visible.sync="replayVisible" width="1300">
    <div class="replay-box">
      <div class="replay-item" @click="usePrePlay(item)" v-for="item in prereplyList" :key="item.id" v-html="item.content"></div>
    </div>
  </t-dialog>
  <div>
    <img id="viewer" :src="preImg" alt="">
  </div>
</div>
<!-- =======页面独有======= -->
<script src="/plugins/addon/idcsmart_ticket/template/admin/api/order.js"></script>
<script src="/plugins/addon/idcsmart_ticket/template/admin/js/userOrderReply.js"></script>
<script src="/plugins/addon/idcsmart_ticket/template/admin/js/tinymce/tinymce.min.js"></script>
<script src="/plugins/addon/idcsmart_ticket/template/admin/js/common/viewer.min.js"></script>