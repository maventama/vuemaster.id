<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @inertiaHead
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/yogastama/bootstrap_retro@master/css/bootstrap_retro.min.css">
    <link rel="shortcut icon" href="./assets/vuemaster.png" type="image/x-icon">
    <link href="{{ mix('/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.min.css" integrity="sha512-UrjLcAek5jbj1vwGbXkviPHtgSNVNQCedX7cBIMDdSI2iZtUcZcoTh2Sqc8R9mVcijOjFUi1IlxhfrE1uWaIog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Hotjar Tracking Code for https://vuemaster.id/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:3275528,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
  </head>
  <body>
    @inertia
    <script src="https://cdn.jsdelivr.net/gh/yogastama/bootstrap_retro@master/js/bootstrap.min.js"></script>
    <!-- Google tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161989465-1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notie/4.3.1/notie.min.js" integrity="sha512-NHRCwRf2LnVSlLDejCA9oS3fG3/FLSQIPCjAWl3M7tVi5wszwr6FxkjotWnQDXLE+aLKcxRrzFDNEgXj9nvkPw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-161989465-1');
    </script>
    <!-- Facebook Pixel Code --><script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '729283478770295'); fbq('track', 'PageView');</script><noscript> <img height="1" width="1" src="https://www.facebook.com/tr?id=729283478770295&ev=PageView&noscript=1"/></noscript><!-- End Facebook Pixel Code -->
  </body>
</html>