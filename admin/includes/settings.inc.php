<?php if (!defined('IN_AP')) exit('Access Denied'); ?>
      <div class="title">
        <div class="container">
          <div class="pull-left">
            <h1>網站設定</h1>
          </div>
          <div class="toolbar pull-right">
            <div class="btn-group">
              <a href="#" class="btn"><i class="icon-pencil"></i> 草稿 <span class="badge">2</span> </a>
              <a href="#" class="btn"><i class="icon-trash"></i> 垃圾桶</a>
            </div>
            <div class="btn-group">
              <a href="#" class="btn btn-primary"><i class="icon-plus icon-white"></i> 新頁面 </a>
            </div>
          </div>
        </div>
      </div>
      <br>
      <form class="form-horizontal container" method="post"><?php

if(array_key_exists('submit', $_POST)) {

  /* Change Settings */
  $config->settings->site_name = cHTML($_POST["site_name"]);

  /* Save Config File */
  if ($config->asXml(__DATA__.'_config.xml')) {
    echo "<div class=\"alert alert-success\">儲存成功</div>";
  } else {
    echo "<div class=\"alert alert-error\">儲存失敗！請檢查檔案權限，並再嘗試一次。</div>";
  }
}

      ?><fieldset>
          <legend>一般</legend>

          <div class="control-group">
            <label class="control-label">網站名稱</label>
            <div class="controls">
              <input type="text" name="site_name" class="input-xlarge" placeholder="全新的 UCMS 網站！" value="<?php echo $config->settings->site_name ?>">
              <span class="help-inline">顯示在網頁標題、E-mail 中。</span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">擁有者名稱</label>
            <div class="controls">
              <input type="text" name="owner_name" class="input-xlarge" placeholder="我的組織" value="<?php echo $config->settings->site_owner ?>">
              <span class="help-inline"></span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">管理者 E-mail</label>
            <div class="controls">
              <input type="text" name="site_description" class="input-xlarge" placeholder="歡迎光臨我的網站。" value=""><br><br>
              <input type="text" name="site_description" class="input-xlarge" placeholder="歡迎光臨我的網站。" value="">
                            <span class="help-inline">一些關於這個網站的介紹。會顯示在搜尋引擎的簡介中。(SEO)</span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">網站簡介</label>
            <div class="controls">
              <input type="text" name="site_description" class="input-xlarge" placeholder="歡迎光臨我的網站。" value="<?php echo $config->settings->site_description ?>">
              <span class="help-inline">一些關於這個網站的介紹。會顯示在搜尋引擎的簡介中。(SEO)</span>
            </div>
          </div>

          <legend>顯示</legend>

          <div class="control-group">
            <label class="checkbox checkbox-control control-label">
              顯示首頁的標題
              <input type="checkbox" name="show_index_title" value="">
            </label>
          </div>

          <div class="control-group">
            <label class="control-label">標題分隔字元</label>
            <div class="controls">
              <input type="text" name="title_delimiter" class="input-xlarge" placeholder=" | " value="">
              <span class="help-inline"></span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">頁尾導航分隔字元</label>
            <div class="controls">
              <input type="text" name="small_nav_delimiter" class="input-xlarge" placeholder="．" value="">
              <span class="help-inline"></span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">頁首</label>
            <div class="controls">
              <textarea name="global_head" class="input-xlarge" id="textarea" rows="5" placeholder="支援 HTML 標記"></textarea>
              <span class="help-inline">這會取代模板中的 <code>{HEAD}</code> 關鍵字。</span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">頁尾</label>
            <div class="controls">
              <textarea name="global_head" class="input-xlarge" id="textarea" rows="5" placeholder="支援 HTML 標記"></textarea>
              <span class="help-inline">這會取代模板中的 <code>{FOOT}</code> 關鍵字。</span>
            </div>
          </div>

          <div class="control-group">
            <label class="checkbox checkbox-control control-label">
              顯示側欄
              <input type="checkbox" name="global_show_aside" value="">
            </label>
          </div>

          <div class="control-group">
            <label class="control-label">側欄</label>
            <div class="controls">
              <textarea name="global_aside" class="input-xlarge" id="textarea" rows="5" placeholder="支援 HTML 標記"></textarea>
              <span class="help-inline">這會取代模板中的 <code>{ASIDE}</code> 關鍵字。</span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">版權宣告</label>
            <div class="controls">
              <textarea name="copyright" class="input-xlarge" id="textarea" rows="5" placeholder="支援 HTML 標記"></textarea>
              <span class="help-inline">這會取代模板中的 <code>{COPYRIGHT}</code> 關鍵字。留白以使用預設的版權宣告。</span>
            </div>
          </div>

          <div class="control-group">
            <label class="checkbox checkbox-control control-label">
              在頁尾顯示導航
              <input type="checkbox" name="nav_display_links_on_footer" value="">
            </label>
          </div>

          <div class="control-group">
            <label class="control-label">自訂 &lt;head&gt; 標籤</label>
            <div class="controls">
              <textarea name="copyright" class="input-xlarge" id="textarea" rows="5" placeholder=""></textarea>
              <span class="help-inline">輸入代碼以嵌入到每一頁的 <code>&lt;/head&gt;</code> 上方。</span>
            </div>
          </div>

          <input type="hidden" name="submit" value="1">

          <button type="submit" class="btn ptn-primary">Submit</button>

        </fieldset>
      </form>
      <br>
