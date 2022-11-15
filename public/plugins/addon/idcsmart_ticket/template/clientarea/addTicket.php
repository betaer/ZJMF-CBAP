<!-- 页面独有样式 -->
<link rel="stylesheet" href="/plugins/addon/idcsmart_ticket/template/clientarea/css/addTicket.css">
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
    <div class="template add-ticket">
        <el-container>
            <aside-menu></aside-menu>
            <el-container>
                <top-menu></top-menu>
                <el-main>
                    <!-- 自己的东西 -->
                    <div class="main-card">
                        <div class="top">
                            <div class="top-l"><img src="/plugins/addon/idcsmart_ticket/template/clientarea/img/finance/back.png" class="top-img" @click="backTicket">{{lang.ticket_title2}}</div>
                        </div>
                        <div class="top-line"></div>

                        <div class="main-form">
                            <el-form ref="form" :model="ticketData" label-width="80px" :rules="rules">
                                <el-form-item :label="lang.ticket_label2" prop="ticket_type_id">
                                    <el-select class="select-type" v-model="ticketData.admin_role_id" :placeholder="lang.ticket_tips8" @change="departmentChange">
                                        <el-option v-for="item in departmentList" :key="item.admin_role_id" :value="item.admin_role_id" :label="item.name"></el-option>
                                    </el-select>
                                    <el-select class="select-type" v-model="ticketData.ticket_type_id" :placeholder="lang.ticket_tips2">
                                        <el-option v-for="item in ticketType" :key="item.id" :value="item.id" :label="item.name"></el-option>
                                    </el-select>
                                </el-form-item>
                                <div class="title-host">
                                    <el-form-item :label="lang.ticket_label6" prop="title">
                                        <el-input class="select-title" v-model="ticketData.title" :placeholder="lang.ticket_tips9" maxlength="20"></el-input>
                                    </el-form-item>
                                    <el-form-item :label="lang.ticket_label7" prop="host_ids">
                                        <el-select filterable class="select-host" v-model="ticketData.host_ids" :placeholder="lang.ticket_tips10" multiple collapse-tags clearable>
                                            <el-option v-for="item in hostList" :key="item.id" :value="item.id" :label="item.product_name + '('+item.name+')'"></el-option>
                                        </el-select>
                                    </el-form-item>
                                </div>
                                <el-form-item :label="lang.ticket_label8" prop="content">
                                    <!-- <div>
                                        <textarea id="tiny" name="content" >{{ticketData.content}}</textarea>
                                    </div> -->
                                    <el-input class="msg-input" type="textarea" :autosize="{ minRows: 5, maxRows: 5}" resize=none maxlength="3000" placeholder="请输入内容" v-model="ticketData.content">
                                    </el-input>

                                </el-form-item>
                                <el-form-item>
                                    <div style="display: flex;justify-content: space-between;">
                                        <el-upload ref="fileupload" class="upload-btn" action="/console/v1/upload" :before-remove="beforeRemove" multiple :file-list="fileList" :on-success="handleSuccess">
                                            <el-button icon="el-icon-upload2">上传文件</el-button>
                                        </el-upload>
                                        <div class="sub-btn" @click="onSubmit" v-loading="loading">{{lang.ticket_btn8}}</div>
                                    </div>
                                    <!-- <el-button type="primary" @click="onSubmit" v-loading="loading">确认</el-button> -->

                                </el-form-item>
                            </el-form>
                        </div>
                    </div>
                </el-main>
            </el-container>
        </el-container>
    </div>
    <!-- =======页面独有======= -->
    <script src="/plugins/addon/idcsmart_ticket/template/clientarea/api/common.js"></script>
    <script src="/plugins/addon/idcsmart_ticket/template/clientarea/api/ticket.js"></script>
    <script src="/plugins/addon/idcsmart_ticket/template/clientarea/js/addTicket.js"></script>
    <script src="/plugins/addon/idcsmart_ticket/template/clientarea/utils/util.js"></script>
    <script src="/plugins/addon/idcsmart_ticket/template/clientarea/js/tinymce/tinymce.min.js"></script>