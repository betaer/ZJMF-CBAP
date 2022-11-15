<link rel="stylesheet" href="/plugins/addon/idcsmart_withdraw/template/admin/css/withdrawal.css" />
<!-- =======内容区域======= -->

<div id="content" class="withdrawal-setting table" v-cloak>
  <t-card class="list-card-container">
    <ul class="common-tab">
      <li>
        <a href="index.html">{{lang.applicat_list}}</a>
      </li>
      <li>
        <a href="balance_withdrawal_settings.html">{{lang.balance_withdrawal_settings}}</a>
      </li>
      <li class="active">
        <a href="javascript:;">{{lang.withdrawal_setting}}</a>
      </li>
    </ul>
    <div class="box">
      <div class="item">
        <div class="top">
          <span class="tit">{{lang.withdrawal_way}}</span>
          <span class="add" @click="addItem('way')">{{lang.add}}</span>
        </div>
        <t-table row-key="id" :data="wayList" size="medium" :columns="columns" :hover="hover" :loading="loading" :table-layout="tableLayout ? 'auto' : 'fixed'" :hide-sort-tips="hideSortTips" bordered>
          <template #create_time="{row}">
            {{row.create_time ? moment(row.create_time * 1000).format('YYYY-MM-DD HH:mm') : '--'}}
          </template>
          <template #op="{row}">
            <t-tooltip :content="lang.edit" :show-arrow="false" theme="light">
              <t-icon name="edit-1" class="common-look" @click="editItem(row,'way')">
              </t-icon>
            </t-tooltip>
            <t-tooltip :content="lang.delete" :show-arrow="false" theme="light">
              <t-icon name="delete" class="common-look" @click="delItem(row,'way')">
              </t-icon>
            </t-tooltip>
          </template>
        </t-table>
      </div>
      <div class="item">
        <div class="top">
          <span class="tit">{{lang.dismiss_the_reason}}</span>
          <span class="add" @click="addItem('reject')">{{lang.add}}</span>
        </div>
        <t-table row-key="id" :data="rejectList" size="medium" :columns="columns1" :hover="hover" :loading="rejectLoading" :table-layout="tableLayout ? 'auto' : 'fixed'" :hide-sort-tips="hideSortTips" bordered>
          <template #create_time="{row}">
            {{row.create_time ? moment(row.create_time * 1000).format('YYYY-MM-DD HH:mm') : '--'}}
          </template>
          <template #op="{row}">
            <t-tooltip :content="lang.edit" :show-arrow="false" theme="light">
              <t-icon name="edit-1" class="common-look" @click="editItem(row,'reject')">
              </t-icon>
            </t-tooltip>
            <t-tooltip :content="lang.delete" :show-arrow="false" theme="light">
              <t-icon name="delete" class="common-look" @click="delItem(row,'reject')">
              </t-icon>
            </t-tooltip>
          </template>
        </t-table>
      </div>
    </div>
  </t-card>
  <!-- 驳回 -->
  <t-dialog :visible.sync="visible" :header="diaTitle" :on-close="close" :footer="false" width="500">
    <t-form :rules="rules" :data="formData" ref="userDialog" @submit="onSubmit" v-if="visible" label-align="top">
      <t-form-item :label="lang.withdrawal_way" name="name" v-if="optType === 'way'">
        <t-input v-model="formData.name" :placeholder="lang.input + lang.withdrawal_way"></t-input>
      </t-form-item>
      <t-form-item :label="lang.dismiss_the_reason" name="reason" v-if="optType === 'reject'">
        <t-input v-model="formData.reason" :placeholder="lang.input + lang.dismiss_the_reason"></t-input>
      </t-form-item>
      <div class="f-btn">
        <t-button theme="primary" type="submit" :loading="submitLoading">{{lang.hold}}</t-button>
        <t-button theme="default" variant="base" @click="visible = false">{{lang.cancel}}</t-button>
      </div>
    </t-form>
  </t-dialog>
  <!-- 删除弹窗 -->
  <t-dialog theme="warning" :header="lang.sureDelete" :visible.sync="delVisible">
    <template slot="footer">
      <t-button theme="primary" @click="sureDel">{{lang.sure}}</t-button>
      <t-button theme="default" @click="close">{{lang.cancel}}</t-button>
    </template>
  </t-dialog>
</div>

<script src="/plugins/addon/idcsmart_withdraw/template/admin/api/withdrawal.js"></script>
<script src="/plugins/addon/idcsmart_withdraw/template/admin/js/withdrawal_setting.js"></script>