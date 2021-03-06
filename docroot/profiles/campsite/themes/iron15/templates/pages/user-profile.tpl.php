<?php //dsm($user_profile) ?>

<?php if ($variables['elements']['#view_mode'] == 'attendee'): ?>
    <div class="user-attendee">
      <div class="user-image">
        <?php
        $link = drupal_get_path_alias('user/' .$variables['elements']['#account']->uid);
         if (!empty($user_profile['field_user_picture'][0]['#item']['uri'])){
            print l(theme_image_style(
                array(
                    'style_name' => 'thumbnail',
                    'path' => $user_profile['field_user_picture'][0]['#item']['uri'],
                    "height" => NULL,
                    "width" => NULL
                )),
                $link, array('html'=>TRUE));
        }else {
            print l('<div class="svg-drupal"></div>', $link, array('class' => 'svg-drupal', 'html'=>TRUE));
        } ?>
        </div>
        <div class="name">
            <?php print render($user_profile['field_user_first_name']);  ?>
            <?php print render($user_profile['field_user_last_name']);  ?>
            <div class="user-name">
                <?php if (isset($variables['elements']['#account']->name
                )) {
                    print l($variables['elements']['#account']->name, $link);

                } ?>
            </div>
        </div>
    </div>

<?php else: ?>
<div class="wrapper">

       <div class="row">
           <div class="col-sm-8">
               <?php print render($user_profile['field_user_picture']);  ?>
               <?php print render($user_profile['field_user_first_name']);  ?>
               <?php print render($user_profile['field_user_last_name']);  ?>
               <?php print render($user_profile['summary']);  ?>
               <?php print render($user_profile['field_user_job_title']);  ?>
               <?php print render($user_profile['field_user_organization']);  ?>
               <?php print render($user_profile['field_user_about_me']);  ?>
               <?php print render($user_profile['field_user_country']);  ?>
               <?php print render($user_profile['field_user_social_facebook']);  ?>
              <?php print render($user_profile['field_user_social_twitter']);  ?>
               <?php print render($user_profile['field_user_social_linkedin']);  ?>
               <?php print render($user_profile['field_user_social_dorg']);  ?>
           </div>
           <div class="col-sm-4">
               <?php print render($user_profile['links']); ?>
               <?php print render($user_profile); ?>
           </div>
        </div>

        <?php
        // DISPLAY LOGGIN BUTTON IF CURRENT USER PAGE IS VIEWED
        global $user;
        // get name of current user
        $currentUser = $user->uid;
        $profileuser = user_load(arg(1));
        $profileuseruid = $profileuser->uid; ?>
         <?php if($currentUser == $profileuseruid): ?>
                <a href="/user/logout" class="btn btn-default logout">Log out</a>
        <?php endif; ?>
    </div>
<?php endif; ?>
