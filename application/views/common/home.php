<?php 
$this->load->view('common/user_new_header');
?>
<!-- Begin main-contain -->
        <section class="main-contain">
            <div class="container">
                <div class="row">
                <div class="col-xs-1 col-md-5 col-sm-4 col-lg-6">
                  <div class="slider-img">
                      <img src=<?php echo base_url()."assets/new_files/images/img-01.png" ?> alt="" />
                  </div>
                </div>
                     <div class="col-xs-11 col-md-7 col-sm-8 col-lg-6">
                        <div class="slider_container">
                            <div class="row">
                                <h2>welcome to</h2>
                                <h1>build <span>a</span> group</h1>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum
the printing and typesetting industry Lorem Ipsum. </p>
                            <div class="sign-up"><a href=<?php echo base_url()."user/register";?>>Sign up</a></div>
                              <div class="find-a-group-btn">
                                  <a href="javascript:;">Find <span>a group</span>
                                      <i class="fa fa-angle-right"></i>
                                  </a>
                              </div>
                              <div class="start-a-group-btn">
                                  <a href=<?php echo base_url()."Group/addgroup";?> >Start <span>a group</span>
                                      <i class="fa fa-angle-right"></i>
                                  </a>
                              </div>
                            </div>

                        </div>
                     </div>
                </div>
            </div>
        </section>
        <!-- End main-contain -->
        
        <?php $this->load->view('common/user_new_search');?>
        
        <section class="calender-main" id="calender_ctn">
                <div class="container">
                    <div class="col-xs-12  col-sm-8 col-md-9">
                        <div class="row" id="calender_ctn_data">
                          
                          <div style="clear:both"></div>
                          <div class="row text-center" id="show_more_btn">
                             <div class="show-more">
                                  <button id="show_more" class="btn btn-default navbar-btn" type="button">Show more</button>
                             </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-xs-12  col-sm-4 col-md-3">
                      <div class="right-bar-box right-bar-box-mgn-none">
                          <div class="right-bar">
                              <div class="list-group">
                                  <a href="#" class="list-group-item active"><i class="fa fa-chevron-right"></i>All groups</a>
                                  <a href="#" class="list-group-item"><i class="fa fa-chevron-right"></i>My groups & suggestions</a>
                                  <a href="#" class="list-group-item"><i class="fa fa-chevron-right"></i>My groups</a>
                                  <a href="#" class="list-group-item"><i class="fa fa-chevron-right"></i>I'm going </a>
                              </div>
                            </div>
                          <div class="calender-box" id="calender_disp">
                            <!--<img src=<?php //echo base_url()."assets/new_files/images/calendar-icon-img.png" ?> alt="" />-->
                          </div>
                      </div>
                    </div>
                </div>
           </section>
        <!-- End main-title -->

        <div id="page_content">
                <!-- Begin main-title -->
                <section class="container">
                            <div class="main-title">
                                Sort by <span>Best Match</span>
                                <h1></h1>
                            </div>
                      </section>
                <!-- End main-title -->

                <!-- Begin Gallery-box -->
                <div  class="container">
                        <div class="row" id="group_list">
                            <div id="group_list_data">
                            <input type="hidden" name="pages" id="pages" value="">
                            <input type="hidden" name="pagenum" id="pagenum" value="1">
                                <?php foreach ($grp_data as $grp_key => $grp_value) { ?>
                                  <div class="col-md-4 col-sm-4">
                                        <div class="gallery-box">
                                             <div class="thumbnail">
                                                  <div class="caption">
                                                      <a href=<?php echo base_url()."group/join_group/".$grp_value->grp_id ;?> class="label-default"><i class="fa fa-link"></i></a>
                                                  </div>
                                                  <?php if(!empty($grp_value->grp_image)){?>
                                                    <img src=<?php echo base_url()."uploads/group_image/".$grp_value->grp_id.'/thumb/'.$grp_value->grp_image; ?> alt="" />
                                                  <?php }else{ ?>
                                                    <img src=<?php echo base_url()."uploads/general/no-image-available.jpg"; ?> alt="" />
                                                  <?php  } ?>
                                              </div>
                                            <div class="gallery-contain">
                                                <h3><a href=<?php echo base_url()."group/groupdetailshow/".$grp_value->grp_id; ?> ><?php echo $grp_value->grp_name;?></a></h3>
                                                <p><?php echo $grp_value->grp_desc;?></p>
                                                <h2><i class="fa fa-users"></i><?php echo $grp_value->tot_member;?> Members</h2>
                                            </div>
                                        </div>
                                    </div>             

                                <?php } ?>
                            </div>
                            <!--<div  id="calender_ctn">
                              <div class="col-md-8 col-sm-8" id="calender_list_data">
                                
                              </div>
                              <div id="calender_disp" class="" >
                                
                              </div>

                            </div>-->
                        </div>
                    </div>
                <!-- End Gallery-box -->
        </div>
             </section>
  <!-- End wrapper -->
<?php 
$this->load->view('common/user_new_footer');
?>

<script src="<?php echo base_url().'assets/admin/js/user_home.js'; ?>" ></script>