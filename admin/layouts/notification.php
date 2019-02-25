<!-- notification drop down -->
<li class="dropdown">
    <a href="#" onclick="read_admin_notification()" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span> 
        
        <span id="badge-notif">
            <span class="badge" style="background-color: red;"><?= ($notification->count_unread_admin() > 0) ? $notification->count_unread_admin() : '' ?></span>
        </span>
    </a>

    <ul class="dropdown-menu notify-drop">
        <div class="notify-drop-title">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">Notification <?= ($notification->count_unread_admin() > 0) ? '(<b>'.$notification->count_unread_admin().'</b>)' : '' ?></div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom"><i class="fa fa-dot-circle-o"></i></a></div>
            </div>
        </div>


        <!-- notify content -->
        <div class="drop-content">
            <?php if (!empty($notification->get_admin())): ?>
                <?php foreach($notification->get_admin() as $data): ?>
                    <li>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="notify-img">
                                <img height="45" width="45" src="<?= $data['b_img'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                            <a href="#"><?= $data['moviename'] ?></a> 
                            <?= ' was '.$data['type'].'.' ?>
                            
                            <?php if(!$data['has_read']): ?>
                                <span class="badge">New</span>
                            <?php endif; ?>
                            
                            <a href="#" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                            <br>
                            By: <strong><?= $data['user'] ?></strong>                
                            <hr>
                            <p class="time"><?= $data['created_at'] ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </ul>
</li><!-- end notification -->
