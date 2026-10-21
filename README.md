# Disable Email and Password

A free [XenForo](https://xenforo.com/) add-on that stops chosen user groups from changing their email address or password, and can send members to your own pages instead. It's made for sites where accounts are managed somewhere else, such as a WordPress site or a single sign-on service.

## Features

- **Edit email address** and **Edit password** permissions, so you can turn them off for any user group
- Applies on the forum and through the REST API. Admins can still change any member's email or password from the admin panel.
- Send members who can't edit their email to your own page instead, from the **Change** button on Account details and Account security
- Send **Forgot your password?** to your own page, or turn password reset off entirely. With reset off, reset links that were already emailed stop working too.
- The Account security page only shows the password form to members who have a password and are allowed to change it

## Settings

**Setup → Options → User options:**

- **Edit profile custom URL**: where members go to change their email address and password
- **Disable password reset**: hides **Forgot your password?** and turns password reset off. The custom reset URL is ignored while this is on.
- **Reset password custom URL**: where **Forgot your password?** goes

**Groups & permissions → User group permissions → General permissions:**

- **Edit email address**
- **Edit password**

Both are allowed for every group when the add-on is installed, so nothing changes until you turn them off for a group.

## Developers

- Permissions: `mg_edit_email` and `mg_edit_password` in the `generalPermissions` group
- Options: `mg_emailchange_custom_link`, `mg_forgotpassword_custom_link` and `mg_disable_resetpassword_login`
- Class extensions: `XF\Pub\Controller\Account`, `XF\Pub\Controller\LostPassword`, `XF\Service\User\EmailChange` and `XF\Service\User\PasswordChange`

## Requirements

- XenForo 2.2 or later
- PHP 7.2 or later

## Install

1. Download the latest `Mangini-DisableEmailPassword-x.y.z.zip` from the [Releases page](https://github.com/XFtoWP/disable-email-password/releases).
2. In your XenForo admin, go to **Add-ons → Install/upgrade from archive** and upload the zip.
3. Turn off **Edit email address** or **Edit password** for the groups that shouldn't change them, and set your custom URLs if you have them.

To work on the code, clone this repository into `src/addons/Mangini/DisableEmailPassword` in a XenForo development install.

## License

MIT. See [LICENSE.txt](LICENSE.txt).
