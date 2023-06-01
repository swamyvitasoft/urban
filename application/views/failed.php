<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <link rel="shortcut icon" href="<?=base_url('uploads/'.$site[0]->favicon);?>" />
    <title><?=$site[0]->title;?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700" rel="stylesheet" media="screen">
    <style>
      .hover-underline:hover {
        text-decoration: underline !important;
      }

      @keyframes spin {
        to {
          transform: rotate(360deg);
        }
      }

      @keyframes ping {

        75%,
        100% {
          transform: scale(2);
          opacity: 0;
        }
      }

      @keyframes pulse {
        50% {
          opacity: .5;
        }
      }

      @keyframes bounce {

        0%,
        100% {
          transform: translateY(-25%);
          animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
        }

        50% {
          transform: none;
          animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }
      }

      @media (max-width: 600px) {
        .sm-px-24 {
          padding-left: 24px !important;
          padding-right: 24px !important;
        }

        .sm-py-32 {
          padding-top: 32px !important;
          padding-bottom: 32px !important;
        }

        .sm-w-full {
          width: 100% !important;
        }
      }
    </style>
  </head>
  <body style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased; --bg-opacity: 1; background-color: #eceff1;">
    <div style="display: none;">A request to reset password was received from your <?=$site[0]->title;?> Account</div>
    <div role="article" aria-roledescription="email" aria-label="Reset your Password" lang="en">
      <table style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
          <td align="center" style="--bg-opacity: 1; background-color: #eceff1; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;">
            <table class="sm-w-full" style="font-family: 'Montserrat',Arial,sans-serif; width: 600px;" width="600" cellpadding="0" cellspacing="0" role="presentation">
              <tr>
                <td class="sm-py-32 sm-px-24" style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; padding: 48px; text-align: center;" align="center">
                  <a href="<?=base_url();?>">
                    <?php if(pic($site[0]->logo)) { ?>
                        <img src="<?=pic($site[0]->logo);?>" width="80%" alt="<?=$site[0]->title;?>" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;">
                    <?php } else { ?>
                        <h2 class="brand-text text-primary ml-1"><?=$site[0]->title;?></h2>
                    <?php } ?>
                  </a>
                </td>
              </tr>
              <tr>
                <td align="center" class="sm-px-24" style="font-family: 'Montserrat',Arial,sans-serif;">
                  <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                      <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; border-radius: 4px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 24px;padding: 48px 48px 0px 48px; text-align: center; --text-opacity: 1; color: red;" align="center">
                        <p style="font-weight: 700; font-size: 24px; margin-bottom: 0;">Couldn't find your account</p>
                      </td>
                    </tr>
                    <tr>
                      <td class="sm-px-24" style="background-color: #ffffff;font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 24px;text-align: center; --text-opacity: 1; color: #626262;" align="center">
                        <img src="<?=pic('error.gif');?>" width="50%" alt="activated" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;">
                      </td>
                    </tr>
                    <tr>
                      <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; border-radius: 4px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px; padding: 0px 48px 48px 48px; text-align: center; --text-opacity: 1; color: #626262;" align="center">
                        <p style="margin: 0 0 10px;">
                          If you did not activate your account or need our help keeping the account, please contact us at
                          <a href="mailto:<?=$site[0]->sentmail;?>" class="hover-underline" style="--text-opacity: 1; color: #7367f0; text-decoration: none;"><?=$site[0]->sentmail;?></a>
                        </p>
                        <p style="margin: 0 0 24px;"></p>
                        <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                          <tr>
                            <td style="font-family: 'Montserrat',Arial,sans-serif; padding-top: 32px; padding-bottom: 32px;">
                              <div style="--bg-opacity: 1; background-color: #eceff1; height: 1px; line-height: 1px;">&zwnj;</div>
                            </td>
                          </tr>
                        </table>
                        <p style="margin: 0 0 16px;">Thanks, <br>The <?=$site[0]->title;?> Team</p>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                    </tr>
                    <tr>
                      <td style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 12px; padding-left: 48px; padding-right: 48px; --text-opacity: 1; color: #eceff1;">
                        <p align="center" style="cursor: default; margin-bottom: 16px;">
                          <a href="https://www.facebook.com/" target="_blank" style="--text-opacity: 1; color: #263238; text-decoration: none;"><img src="<?=base_url('uploads/social/facebook.png');?>" width="17" alt="Facebook" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                          
                          <a href="https://twitter.com/" target="_blank" style="--text-opacity: 1; color: #263238; text-decoration: none;"><img src="<?=base_url('uploads/social/twitter.png');?>" width="17" alt="Twitter" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                          
                          <a href="https://www.instagram.com/" target="_blank" style="--text-opacity: 1; color: #263238; text-decoration: none;"><img src="<?=base_url('uploads/social/instagram.png');?>" width="17" alt="Instagram" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                        </p>
                        <p style="--text-opacity: 1; color: #263238;">
                          Use of our service and website is subject to our
                          <a href="<?=base_url();?>" class="hover-underline" style="--text-opacity: 1; color: #7367f0; text-decoration: none;">Terms of Use</a> and
                          <a href="<?=base_url();?>" class="hover-underline" style="--text-opacity: 1; color: #7367f0; text-decoration: none;">Privacy Policy</a>.
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td style="font-family: 'Montserrat',Arial,sans-serif; height: 16px;" height="16"></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>