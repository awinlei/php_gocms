<?php /* Smarty version 2.6.18, created on 2014-11-11 18:08:38
         compiled from main/main.tpl */ ?>
  <body>
    <div id="header">
      <h1><a href="./dashboard.html">GO AdminPanel</a></h1>   
    </div>
    
    <div id="search">
    </div>
    <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">用户设置</span></a></li>
                <li class="btn btn-inverse"><a title="" href="index.php?controller=Main&command=logout"><i class="icon icon-share-alt"></i> <span class="text">注销登录</span></a></li>
            </ul>
        </div>
            
    <div id="sidebar">
      <a href="#" class="visible-phone"><i class="icon icon-home"></i>11</a>
      <ul>
        <li class="active"><a href="index.html"><i class="icon icon-home"></i> <span>系统首页</span></a></li>
        <li class="submenu">
          <a href="#">
            <i class="icon icon-th-list"></i> 
            <span>系统管理</span><span class="label">3</span>
          </a>
          <ul>
            <li><a href="excel.html">数据导入</a></li>
            <li><a href="charts.html">数据分析</a></li>
            <li><a href="tables.html">复核监控</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="icon icon-th-list"></i> <span>日程管理</span> <span class="label">3</span></a>
          <ul>
            <li><a href="schedule.html">日程信息</a></li>
            <li><a href="msg.html">短信通知</a></li>
            <li><a href="chat.html">内部沟通</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="icon icon-th-list"></i> <span>资料管理</span> <span class="label">4</span></a>
          <ul>
            <li><a href="material.html">资料信息</a></li>
            <li><a href="#">生成报告</a></li>
            <li><a href="#">报告审批</a></li>
            <li><a href="version.html">版本跟踪</a></li>   
          </ul>
        </li>
      </ul>
    
    </div>
    
    <div id="content">
      <div id="content-header">
        <h1>系统首页</h1>
        <div class="btn-group">
        </div>
      </div>
      <div id="breadcrumb">
        <a href="#" title="回到首页" class="tip-bottom"><i class="icon-home"></i>系统首页</a>
      </div>
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="alert alert-info">
              <strong>欢迎来到GO管理系统</strong>
              <a href="#" data-dismiss="alert" class="close">×</a>
            </div>
                    
          </div>
        </div>
        
        <div class="row-fluid">
          <div class="span12">
            <div class="alert alert-info">
              这是一个日历
              <a href="#" class="close" data-dismiss="alert">×</a>
            </div>
            <div class="widget-box widget-calendar">
              <div class="widget-title">
                <span class="icon"><i class="icon-calendar"></i></span>
                <h5>日历</h5>
                <div class="buttons">
                  <a id="add-event" data-toggle="modal" href="#modal-add-event" class="btn btn-success btn-mini"><i class="icon-plus icon-white"></i> 新事件</a>
                  <div class="modal hide" id="modal-add-event">
                     <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">×</button>
                      <h3>添加新事件</h3>
                    </div>
                    <div class="modal-body">
                      <p>事件名称:</p>
                      <p><input id="event-name" type="text" /></p>
                    </div>
                    <div class="modal-footer">
                      <a href="#" class="btn" data-dismiss="modal">取消</a>
                      <a href="#" id="add-event-submit" class="btn btn-primary">确定</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="widget-content nopadding">
                <div class="panel-left">
                  <div id="fullcalendar"></div>
                </div>
                <div id="external-events" class="panel-right">
                  <div class="panel-title"><h5>事件</h5></div>
                  <div class="panel-content">
                    <div class="external-event ui-draggable label label-inverse">My Event 1</div>
                                        <div class="external-event ui-draggable label label-inverse">My Event 2</div>
                                        <div class="external-event ui-draggable label label-inverse">My Event 3</div>
                                        <div class="external-event ui-draggable label label-inverse">My Event 4</div>
                                        <div class="external-event ui-draggable label label-inverse">My Event 5</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row-fluid">
          <div id="footer" class="span12">
            2014 &copy; Wanglilei 
          </div>
        </div>
      </div>
    </div>     <!-- js加载 开始-->

    <script src="<?php echo $this->_tpl_vars['static_path']; ?>
js/jquery.min.js"></script>
    <script src="<?php echo $this->_tpl_vars['static_path']; ?>
js/jquery.ui.custom.js"></script>
    <script src="<?php echo $this->_tpl_vars['static_path']; ?>
js/bootstrap.min.js"></script>
    <script src="<?php echo $this->_tpl_vars['static_path']; ?>
js/fullcalendar.min.js"></script>
    <script src="<?php echo $this->_tpl_vars['static_path']; ?>
js/unicorn.js"></script>
    <script src="<?php echo $this->_tpl_vars['static_path']; ?>
js/unicorn.calendar.js"></script>
    <!-- js加载 结束-->
  </body>