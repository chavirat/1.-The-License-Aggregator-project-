<h3 id ="top"> Insert </h3>
<div class="panel-group" id="accordion" role="tablist">
<div class="panel panel-default">
 <div class="panel-heading" id="headingmatch" role="tab">
 <h3 class="panel-title">
 <a data-parent="#accordion" data-toggle="collapse" href="#insertmatch" role="button">Match license keys</a></h3>
</div>
<div class="panel-collapse collapse in" id="insertmatch" role="tabpanel">
  <div class="panel-body">
    <form class="form-horizontal" action="insert_match.php" method="post">
      <div class="form-group">
        <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="olex_key" name ="olex_key">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="nexb_key" name ="nexb_key">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="SPDX_key" name ="SPDX_key">
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="tldr_key" name ="tldr_key">
        </div>
        <div class="col-sm-offset-2 col-sm-2">
          <button type="submit" class="btn btn-primary">Insert</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- insert olex license -->
<div class="panel panel-default">
 <div class="panel-heading" id="headingolex" role="tab">
 <h3 class="panel-title">
 <a data-parent="#accordion" data-toggle="collapse" href="#insertolex" role="button">Olex license</a></h3>
</div>
<div class="panel-collapse collapse aria-labelledby=" headingtldr="" id="insertolex" role="tabpanel">
  <div class="panel-body">
    <form class="form-horizontal" action="insert_olex.php" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">Olex license key</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="olex_key" name ="olex_key">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">Olex license name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="olex_name" name ="olex_name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Olex url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  placeholder="olex_url" name ="olex_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Model</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Open Source" name ="olex_model">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">Class</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name ="olex_class">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">License base</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name ="olex_license_base">
        </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Insert</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- Insert Nexb license -->
<div class="panel panel-default">
 <div class="panel-heading" id="headingnexb" role="tab">
 <h3 class="panel-title">
 <a data-parent="#accordion" data-toggle="collapse" href="#insertnexb" role="button">Nexb License</a></h3>
</div>
<div class="panel-collapse collapse aria-labelledby=" headingnexb="" id="insertnexb" role="tabpanel">
  <div class="panel-body">
    <form class="form-horizontal" action="insert_nexb.php" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nexb license key</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" placeholder="nexb_key" name ="nexb_key">
        </div>
        <label  class="col-sm-2 control-label">Nexb license name</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  placeholder="nexb_name" name ="nexb_name">
        </div>
        <label  class="col-sm-2 control-label">Nexb short name</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  placeholder="short_name" name ="short_name">
        </div>
      </div>
      <div class="form-group">
        <label  for="guidance" class="col-sm-2 control-label">Guidance</label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="3" name="guidance"></textarea>
        </div>
      </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Category</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="" name ="category">
      </div>
    </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">License type</label>
          <div class="col-sm-2">
            <input type="text" class="form-control"  placeholder="" name ="license_type">
          </div>
          <label class="col-sm-2 control-label">License Profile</label>
          <div class="col-sm-2">
            <input type="text" class="form-control"  placeholder="" name ="license_profile">
          </div>
          <label class="col-sm-2 control-label">License Style</label>
          <div class="col-sm-2">
            <input type="text" class="form-control"  placeholder="" name ="license_style">
          </div>
        </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">SPDX license key</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  name ="SPDX_key">
        </div>
        <label class="col-sm-2 control-label">Publication Year</label>
        <div class="col-sm-2">
          <input type="number" min="1900" max="2100" step="1" value="2000" class="form-control"  name ="publication_year">
        </div>
        <label class="col-sm-2 control-label">Keywords</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  name ="keywords">
        </div>
      </div>
      <div class="form-group">
        <label  for="guidance" class="col-sm-2 control-label">Special Obligation</label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="3" name="special_obligations"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">homepage url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  name ="homepage_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">text url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  name ="text_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">osi url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  name ="osi_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">faq url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  name ="faq_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">guidance url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  name ="guidance_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">other url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  name ="other_urls">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Owner Name</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  name ="owner_name">
        </div>
        <label class="col-sm-2 control-label">Owner type</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  name ="owner_type">
        </div>
        <label class="col-sm-2 control-label">Alias</label>
        <div class="col-sm-2">
          <input type="text" class="form-control"  name ="alias">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Owner homepage</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  name ="owner_homepage_url">
        </div>
      </div>
      <div class="form-group">
        <label  for="guidance" class="col-sm-2 control-label">Contact Information</label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="3" name="contact_information"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label  for="guidance" class="col-sm-2 control-label">Owner Notes</label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="3" name="owner_notes"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Insert</button>
        </div>
      </div>
    </form>
    <div style ="text-align:right">
    <a class ="btn btn-info" href="#top"> TOP </a>
    </div>
  </div>
</div>
</div>
<!-- Insert SPDX license -->
<div class="panel panel-default">
 <div class="panel-heading" id="headingspdx" role="tab">
 <h3 class="panel-title">
 <a data-parent="#accordion" data-toggle="collapse" href="#insertspdx" role="button">SPDX license</a></h3>
</div>
<div class="panel-collapse collapse aria-labelledby=" headingspdx="" id="insertspdx" role="tabpanel">
  <div class="panel-body">
    <form class="form-horizontal" action="insert_spdx.php" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">SPDX license key</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="SPDX_key" name ="SPDX_key">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">SPDX license name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="SPDX_name" name ="SPDX_fullname">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Source url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  placeholder="" name ="SPDX_source_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Notes</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="" name ="SPDX_notes">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">License Header</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name ="license_header">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Insert</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- Insert Tldr license -->
<div class="panel panel-default">
 <div class="panel-heading" id="headingtldr" role="tab">
 <h3 class="panel-title">
 <a data-parent="#accordion" data-toggle="collapse" href="#inserttldr" role="button">Tldr license</a></h3>
</div>
<div class="panel-collapse collapse aria-labelledby=" headingtldr="" id="inserttldr" role="tabpanel">
  <div class="panel-body">
    <form class="form-horizontal" action="insert_tldr.php" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">Tldr license key</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="tldr_key" name ="tldr_key">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">Tldr license name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="tldr_name" name ="tldr_name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tldr url</label>
        <div class="col-sm-10">
          <input type="url" class="form-control"  placeholder="" name ="tldr_url">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Summary</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="3" name="summary"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Insert</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- Insert new obligation for olex_license -->
<div class="panel panel-default">
 <div class="panel-heading" id="headingolexob" role="tab">
 <h3 class="panel-title">
 <a data-parent="#accordion" data-toggle="collapse" href="#insertolex_ob" role="button">Olex obligation</a></h3>
</div>
<div class="panel-collapse collapse aria-labelledby=" headingolexob="" id="insertolex_ob" role="tabpanel">
  <div class="panel-body">
    <form class="form-horizontal" action="insert_olex_ob.php" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">Olex Obligation Code</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Olex Obligation Code" name ="olex_obligation_code">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">Olex Obligation Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Olex Obligation Name" name ="name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Olex Obligation Shortened</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Olex Obligation Shortened" name ="shortened">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Insert</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- Insert new obligation for nexb_license -->
<div class="panel panel-default">
 <div class="panel-heading" id="headingnexbob" role="tab">
 <h3 class="panel-title">
 <a data-parent="#accordion" data-toggle="collapse" href="#insertnexb_ob" role="button">Nexb obligation</a></h3>
</div>
<div class="panel-collapse collapse aria-labelledby=" headingolexob="" id="insertnexb_ob" role="tabpanel">
  <div class="panel-body">
    <form class="form-horizontal" action="insert_nexb_ob.php" method="post">
      <div class="form-group">
        <label class="col-sm-2 control-label">Nexb license Requirement</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Requirement name" name ="requirements">
        </div>
      </div>
      <div class="form-group">
        <label  class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  placeholder="Description" name ="description">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Type</label>
        <div class="col-sm-10">
          <label class="radio-inline"><input type="radio" name="optradio" value="obligation">Obligation</label>
          <label class="radio-inline"><input type="radio" name="optradio" value="restriction">Restriction</label>
          <label class="radio-inline"><input type="radio" name="optradio" value="policies">Policies</label>
          <label class="radio-inline"><input type="radio" name="optradio" value="information">Information</label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Insert</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

</div>
<hr>
<!-- Edit license -->
<h3>Update or Delete</h3>
<?php include 'license_list_edit.php'; ?>
<div style ="text-align:right">
<a class ="btn btn-info" href="#top">TOP</a>
</div>
