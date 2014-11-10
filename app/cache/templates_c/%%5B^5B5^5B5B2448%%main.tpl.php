<?php /* Smarty version 2.6.18, created on 2014-11-05 23:11:13
         compiled from main/main.tpl */ ?>
  <body>
    <div id="header">
      <h1><a href="./dashboard.html">GO 后台管理系统</a></h1>   
    </div>
    
    <div id="search">
    </div>
    <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">用户设置</span></a></li>
                <li class="btn btn-inverse"><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">注销登录</span></a></li>
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
    </div>

     <!-- js加载 -->
     <?php unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($_loop=$this->_tpl_vars['js']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['list']['show'] = true;
$this->_sections['list']['max'] = $this->_sections['list']['loop'];
$this->_sections['list']['step'] = 1;
$this->_sections['list']['start'] = $this->_sections['list']['step'] > 0 ? 0 : $this->_sections['list']['loop']-1;
if ($this->_sections['list']['show']) {
    $this->_sections['list']['total'] = $this->_sections['list']['loop'];
    if ($this->_sections['list']['total'] == 0)
        $this->_sections['list']['show'] = false;
} else
    $this->_sections['list']['total'] = 0;
if ($this->_sections['list']['show']):

            for ($this->_sections['list']['index'] = $this->_sections['list']['start'], $this->_sections['list']['iteration'] = 1;
                 $this->_sections['list']['iteration'] <= $this->_sections['list']['total'];
                 $this->_sections['list']['index'] += $this->_sections['list']['step'], $this->_sections['list']['iteration']++):
$this->_sections['list']['rownum'] = $this->_sections['list']['iteration'];
$this->_sections['list']['index_prev'] = $this->_sections['list']['index'] - $this->_sections['list']['step'];
$this->_sections['list']['index_next'] = $this->_sections['list']['index'] + $this->_sections['list']['step'];
$this->_sections['list']['first']      = ($this->_sections['list']['iteration'] == 1);
$this->_sections['list']['last']       = ($this->_sections['list']['iteration'] == $this->_sections['list']['total']);
?>
     <?php echo $this->_tpl_vars['js'][$this->_sections['list']['index']]; ?>

     <?php endfor; endif; ?>
  </body>