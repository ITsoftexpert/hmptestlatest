<div class="box" align="center" style="font-family: Arial, sans-serif; color: #333;">
    <div class="container" style="max-width: 632px; margin: 0 auto; padding: 0px;">
        <div class="row bg-white" style="background-color: #f9f9f9; padding-top: 25px; padding-bottom: 24px; text-align: center;">

            <div class="icon-container">
                <div class="icon" style="border: 2px solid #000; padding: 18px; display: inline-block;">
                    <img src="<?= img_url('profilemodificationrequired.png'); ?>" width="48" height="48" alt="Settings Icon">
                </div>
            </div>

            <h2 style="font-size: 24px; color: #333;">Profile Setting Modification Required</h2>
            <p style="color: #777; font-size: 16px;">
                Our team has reviewed your profile and determined that certain modifications are needed to comply with our guidelines. Please review the requested changes and update your profile accordingly. If you have any concerns, feel free to contact our support team.
            </p>
            <p style="color: #777; font-size: 16px;">
                <strong>Feedback : </strong><?= $data['feedback']; ?>
            </p>
            <div style="margin-top: 20px;">
                <a href="<?= $site_url; ?>/profile/settings" style="display: inline-block; background-color: <?= $site_color; ?>; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 16px; width:200px;">
                    Modify Your Profile
                </a>
            </div>
        </div>
    </div>
</div>