CaptchaBundle
=============
Provides captcha to your controllers and views
This is a port of Zend_Captcha_Image to use native symfony session

Default images folder is /img/captcha so create it first.
you also need to enable session in your app.config
## How to install:
    git submodule add git://github.com/biGGer/CaptchaBundle.git src/Bundle/CaptchaBundle
### Add CaptchaBundle to your application kernel
    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Bundle\CaptchaBundle\CaptchaBundle(),
            // ...
        );
    }
### Example initialization:
    use Bundle\CaptchaBundle\Image as Captcha;
    // ...
    $captcha = new Captcha();
	$captcha->setSession($this['session']);
    return $this->render('MyBundle:MyController:index.twig', array('captcha' => $captcha));
### And inside template:
    <?php $captcha->render() ?>
    or in twig:
    {{ captcha.render }}
### Check if valid:
    if ($this['session']->get['word'] === $this['request']->request->get('riddle')) {
    echo 'pass!';
    }