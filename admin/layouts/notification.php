<!-- notification drop down -->
<li class="dropdown">
    <!-- <a href="#" onclick="read_notification()" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> -->

    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="glyphicon glyphicon-bell" aria-hidden="true"></span> 
        <?php if ($notification->unread() > 0): ?>
            <span id="badge-notif">
                <span class="badge" style="background-color: red;"><?= $notification->unread() ?></span>
            </span>
        <?php endif; ?>
    </a>

    <ul class="dropdown-menu notify-drop">
        <div class="notify-drop-title">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">Notification <?= ($notification->unread() > 0) ? '(<b>'.$notification->unread().'</b>)' : ''  ?></div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom"><i class="fa fa-dot-circle-o"></i></a></div>
            </div>
        </div>

        <?php $array = $notification->unread_notification() ?>

        <!-- notify content -->
        <div class="drop-content">
            <?php foreach ($notification->get_all() as $notification): ?>
                <li>
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="notify-img">
                            <img height="45" width="45" src="<?= file_exists($notification['b_img']) ? $notification['b_img'] : 'http://placehold.it/45x45'  ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9 pd-l0">
                        <?= ucfirst($notification['type']) ?>
                        <a href="#"><?= $notification['moviename'] ?></a> 
                        
                        <?php //if(in_array($notification['id'], $array)): ?>
                        <span class="badge">New</span>
                        <?php //endif; ?>
                        
                        <a href="#" class="rIcon"><i class="fa fa-dot-circle-o"></i></a>
                        <br>
                        By: <?= $notification['director'] ?>
                    
                        <hr>
                        <p class="time"><?= $notification['created_at'] ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </div>
    </ul>
</li><!-- end notification -->
