<!-- 页面独有样式 -->
<link rel="stylesheet" href="/plugins/addon/idcsmart_news/template/clientarea/css/news.css">
</head>

<body>
  <!-- mounted之前显示 -->
  <div id="mainLoading">
    <div class="ddr ddr1"></div>
    <div class="ddr ddr2"></div>
    <div class="ddr ddr3"></div>
    <div class="ddr ddr4"></div>
    <div class="ddr ddr5"></div>
  </div>
  <div class="news template" v-cloak>
    <el-container>
      <aside-menu></aside-menu>
      <el-container>
        <top-menu></top-menu>
        <div class="top-back"></div>
        <el-main>
          <!-- 自己的东西 -->
          <div class="main-card">
            <div class="main-card-title">{{lang.source_title}}</div>

            <el-input v-model="params.keywords" class="search-input" :placeholder="lang.cloud_tip_2" @keyup.enter.native="inputChange" clearable @clear="getData">
              <i class="el-icon-search input-search" slot="suffix" @Click="inputChange"></i>
            </el-input>

            <img class="back-img" src="/plugins/addon/idcsmart_news/template/clientarea/img/source/source_back.png">
            <el-tabs v-model="activeIndex" @tab-click="handleClick">
              {foreach $addons as $addon}
              {if $addon['name']=='IdcsmartHelp'}
              <el-tab-pane ref="help" id="{$addon.id}" :label="lang.source_tab1" name="1">
              </el-tab-pane>
              {elseif $addon['name']=='IdcsmartNews' /}
              <el-tab-pane ref="news" id="{$addon.id}" :label="lang.source_tab2" name="2">
                <!-- pc端 -->
                <div class="box pc">
                  <div class="com-r-box">
                    <div class="tit">{{lang.news_classify}}</div>
                    <p class="total" @click="getAllnews" :class="{active:curId == ''}">
                      <span>{{lang.file_all}}</span>
                      <span class="tag info">{{folderNum}}</span>
                    </p>
                    <div class="file_folder">
                      <p class="item" v-for="(item,index) in folder" :key="item.id" :class="{active:curId === item.id}" @click="changeFolder(item)">
                        {{item.name}}
                        <span class="tag" :class="{suc: index % 4 === 0 ,war: index % 4 === 1,error: index  % 4 === 2, def: index % 4 === 3}">
                          {{item.news_num > 0 ? item.news_num : 0}}
                        </span>
                      </p>
                    </div>
                  </div>
                  <div class="com-l-box">
                    <div class="top-search">
                      <p class="tit">{{curTit}}</p>
                      <div class="searchbar com-search">
                        <!-- <el-input v-model="params.keywords" style="width: 3.2rem;margin-left: .2rem;" :placeholder="lang.cloud_tip_2" @keyup.enter.native="inputChange" clearable @clear="getData">
                                                    <i class="el-icon-search input-search" slot="suffix" @Click="inputChange"></i>
                                                </el-input> -->
                      </div>
                    </div>
                    <!-- table -->
                    <div class="news-list" v-if="params.total" id="news-list" v-loading="tableLoading">
                      <div class="item" v-for="item in tableData" :key="item.id" @click="goDetail(item.id)">
                        <div class="item-left">
                          <img v-if="item.img" :src="item.img" class="item-img">
                          <img :src="defaultImg[Math.floor(Math.random() * 4)]" alt="" v-else class="item-img">
                        </div>
                        <div class="item-right">
                          <p class="title">{{item.title}}</p>
                          <p class="info">
                            <i class="el-icon-time"></i>
                            <span>{{item.create_time | formateTime}}</span>
                          </p>
                        </div>
                      </div>
                    </div>
                    <!-- no-data -->
                    <div class="no-data" v-else>
                      {{lang.no_data}}
                    </div>
                    <pagination v-if="params.total" :page-data="params" @sizechange="sizeChange" @currentchange="currentChange">
                    </pagination>
                  </div>
                </div>
                <!-- 移动端 -->
                <div class="box mobile">
                  <div class="com-r-box">移动端</div>
                  <div class="com-l-box">
                    在这里写 {{commonData.currency_suffix}}
                    <pagination :page-data="params" @sizechange="sizeChange" @currentchange="currentChange">
                    </pagination>
                  </div>

                </div>
              </el-tab-pane>
              {elseif $addon['name']=='IdcsmartFileDownload' /}
              <el-tab-pane ref="download" id="{$addon.id}" :label="lang.source_tab3" name="3">
              </el-tab-pane>
              {/if}
              {/foreach}
            </el-tabs>
          </div>
        </el-main>
      </el-container>
    </el-container>
  </div>
  <!-- =======页面独有======= -->
  <script src="/plugins/addon/idcsmart_news/template/clientarea/api/common.js"></script>
  <script src="/plugins/addon/idcsmart_news/template/clientarea/utils/util.js"></script>
  <script src="/plugins/addon/idcsmart_news/template/clientarea/api/news.js"></script>
  <script src="/plugins/addon/idcsmart_news/template/clientarea/js/news.js"></script>
  <script src="/plugins/addon/idcsmart_news/template/clientarea/components/pagination/pagination.js"></script>