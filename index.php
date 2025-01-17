<!DOCTYPE html>
<?php
if(file_exists('./bot/.maintenance.txt')){
    header('location: /maintenance');
    die;
}

require 'cookies.php';
?>
<html lang="en">
    <head>
        <script src="https://telegram.org/js/telegram-web-app.js" onload="window.Telegram.WebApp.expand(); window.Telegram.WebApp.setHeaderColor('#000000'); window.Telegram.WebApp.setBackgroundColor('#000000');"></script>
        <meta charset="UTF-8"/>
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://tog.tg"/>
        <meta property="og:site_name" content="The Tog">
        <meta property="og:title" content="The Tog"/>
        <!-- <meta property="og:image" content="https://cobuild.ams3.cdn.digitaloceanspaces.com/website/logo-32.png" /> -->
        <meta property="og:description" content="The Tog"/>
        <meta property="og:locale" content="en_US"/>
        <!-- <link rel="shortcut icon" type="image/png" href="https://cobuild.ams3.cdn.digitaloceanspaces.com/website/logo-32.png" /> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <title><?php echo $botName; ?></title>
        <style>
            body, html {
                background-color: #000;
                height: 100vh;
                padding: 0;
                margin: 0;
            }

            #woof {
                position: absolute;
                bottom: 35%;
                -webkit-transition: opacity 1s ease-in;
                -moz-transition: opacity 1s ease-in;
                transition: opacity 1s ease-in;
                z-index: 100;
                will-change: transform, opacity;
                text-align: center;
                width: 100%;
                font-size: 24px;
                opacity: 0;
            }

            #loader {
                position: absolute;
                top: 50%;
                /* top: 80px; */
                left: 50%;
                -webkit-transform: translate(-50%, -webkit-calc(-50% - 91px));
                -moz-transform: translate(-50%, -moz-calc(-50% - 91px));
                -ms-transform: translate(-50%, calc(-50% - 91px));
                transform: translate(-50%, calc(-50% - 91px));
                -webkit-transition: all .5s ease;
                -moz-transition: all .5s ease;
                transition: all .5s ease;
                /* transition: top .5s ease, width .5s ease, height .5s ease, opacity .6 ease; */
                z-index: 100;
                will-change: transform, opacity;
                width: 220px;
                height: 220px;
            }
            /* #'woof {
                position: absolute;
                bottom: 35%;
                -webkit-transition: opacity 1s ease-in;
                -moz-transition: opacity 1s ease-in;
                transition: opacity 1s ease-in;
                z-index: 100;
                will-change: transform, opacity;
                text-align: center;
                width: 100%;
                font-size: 24px;
                opacity: 0;
            }

            #loader {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -webkit-calc(-50% - 91px));
                -moz-transform: translate(-50%, -moz-calc(-50% - 91px));
                -ms-transform: translate(-50%, calc(-50% - 91px));
                transform: translate(-50%, calc(-50% - 91px));
                -webkit-transition: all .5s ease;
                -moz-transition: all .5s ease;
                transition: all .5s ease;
                z-index: 100;
                will-change: transform, opacity;
                width: 237px;
                height: 242px;
            }' */

            #loader.readyToSlide {
                top: 280px;
                width: 82px;
                height: 84px;
            }

            #loader.readyToFadeOut {
                opacity: 0;
            }

            #off-loader {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -webkit-calc(-50% - 91px + 43px));
                -moz-transform: translate(-50%, -moz-calc(-50% - 91px + 43px));
                -ms-transform: translate(-50%, calc(-50% - 91px + 43px));
                transform: translate(-50%, calc(-50% - 91px + 43px));
                -webkit-transition: all .3s ease;
                -moz-transition: all .3s ease;
                transition: all .3s ease;
                z-index: 90;
                opacity: 0;
                display: none;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -webkit-flex-direction: column;
                -moz-box-orient: vertical;
                -moz-box-direction: normal;
                flex-direction: column;
                padding-bottom: 40px;
            }

            #off-loader svg {
                width: 237px;
                height: 242px;
            }

            #off-loader img {
                width: 220px;
                height: 220px;
            }

            #off-loader div {
                margin-top: 20px;
                height: 20px;
                font-size: 20px;
                display: -webkit-box;
                display: -webkit-flex;
                display: -moz-box;
                display: flex;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -moz-box-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -webkit-justify-content: center;
                -moz-box-pack: center;
                justify-content: center;
            }

            #off-loader.readyToFadeIn {
                opacity: 1;
            }

            .preload {
                opacity: 0;
                display: none;
            }
        </style>
        <script defer data-domain="onetime.dog" src="/assets/script.js"></script>
        <script type="module" crossorigin src="/assets/index-2f78f68e.js?v=444"></script>
        <link rel="modulepreload" crossorigin href="/assets/vendor-1253c29e.js">
        <link rel="stylesheet" href="/assets/index-26cd5fcb.css">
    </head>
    <body data-mode="dark">
        <img class="preload" src="/assets/star.png"/>
        <div id="woof">woof</div>
            <!-- <img  style="width: 100% !important; max-width: 160px !important; padding: 10px; important" src="assets/age-wallet-transparent.png"> -->
            <img id="loader" src="assets/age-wallet-transparent2.png" viewBox="0 0 237 245" fill="none">
        </div>
         <div id="off-loader">
         <img id="loader" src="assets/age-wallet-transparent2.png" viewBox="0 0 237 245" fill="none">
            <!-- <svg id="loader" xmlns="http://www.w3.org/2000/svg" width="237" height="245" viewBox="0 0 237 245" fill="none">
                <path d="M9.10893 11.5636C15.6423 4.89697 22.8423 1.43031 32.7089 0.363647C40.9756 -0.569687 54.4423 0.363647 59.7756 2.36365C61.5089 3.03032 56.7089 3.43031 47.1089 3.43031C33.6423 3.43031 30.5756 3.83031 24.5756 6.63031C-1.15774 18.097 -2.22441 47.697 21.7756 84.2303C25.7756 90.3636 31.5089 98.3636 34.4423 101.964L39.7756 108.63L31.3756 126.497C26.7089 136.23 22.8423 144.63 22.8423 144.897C22.8423 145.164 27.9089 145.43 34.1756 145.43H45.5089L47.6423 140.097L49.7756 134.764H58.4423C66.7089 134.764 67.3756 135.03 73.9089 140.63C85.3756 150.364 109.909 166.364 125.642 174.23C184.842 203.83 232.976 199.964 237.109 165.43C237.776 160.097 238.176 158.897 238.976 160.764C242.042 168.764 238.442 180.23 230.709 187.697C216.442 201.164 187.776 202.497 153.909 191.297C127.776 182.63 104.442 169.964 78.1756 150.097C62.4423 138.23 58.4423 137.564 50.8423 145.297L45.3756 150.764H34.5756C22.8423 150.764 18.8423 148.897 18.8423 143.564C18.8423 141.964 22.0423 133.83 26.0423 125.297C30.2926 115.932 32.2854 112.094 31.7683 108.63C31.3284 105.684 29.0715 103.008 24.8423 97.4303C-1.02441 63.297 -7.42441 28.6303 9.10893 11.5636ZM15.1089 16.7636C19.9089 11.0303 25.1089 8.09695 34.8423 5.83028C41.6423 4.23029 44.9756 4.36362 68.1756 6.23029C86.8423 7.69695 127.776 27.5636 150.176 45.9636C157.376 51.8303 152.976 50.6303 142.842 43.9636C116.976 26.897 80.9756 12.2303 58.8423 9.69695C33.6423 6.76361 18.5756 13.297 14.0423 29.1636C11.1089 39.1636 13.1089 49.9636 20.7089 66.097C38.4422 103.43 83.9089 145.03 132.842 168.764C161.242 182.497 180.042 187.564 199.776 186.497C221.376 185.43 232.309 175.43 232.042 157.164L231.909 150.097L230.176 157.43C226.176 173.697 210.309 179.564 184.576 174.23C132.042 163.164 64.1756 111.83 41.3756 66.097C26.4423 35.9636 34.8423 17.5636 63.5089 17.4303C86.8423 17.4303 116.709 28.7636 146.309 48.7636C153.376 53.5636 161.109 58.3636 163.642 59.4303C166.042 60.3636 171.109 64.097 174.842 67.5636L181.509 73.8303V68.2303C181.509 64.097 182.309 61.8303 184.842 59.4303C188.042 56.097 188.176 56.097 214.042 56.097H240.042L242.709 59.5636C244.842 62.2303 245.509 65.0303 245.509 70.897C245.509 77.5636 244.976 79.297 241.642 83.0303C239.463 85.5106 238.512 86.5927 238.551 87.6381C238.581 88.4471 239.204 89.2342 240.309 90.6303C242.176 92.897 242.842 95.8303 242.842 102.364C242.842 109.697 242.309 111.297 239.509 114.097C236.709 117.03 235.109 117.43 226.309 117.43C211.776 117.43 212.709 119.564 227.642 120.364C244.309 121.297 246.176 122.764 246.176 135.964C246.176 145.83 243.909 150.23 238.576 151.03C236.309 151.43 235.909 152.63 235.642 160.097C235.109 177.03 224.976 187.697 206.709 190.764C183.642 194.63 147.242 183.964 111.642 162.764C36.5756 117.964 -10.0911 47.4303 15.1089 16.7636ZM148.176 53.4303C148.176 51.1636 105.776 31.1636 92.8423 27.4303C84.7089 25.0303 76.7089 23.6969 68.1756 23.297C53.7756 22.7636 48.1756 24.2303 43.2422 30.097C40.1756 33.5636 39.9089 34.7636 40.4423 43.297C40.8423 49.9636 42.0423 55.1636 44.7089 61.0303C48.7089 69.697 51.3756 71.5636 52.8423 66.6303C53.3756 65.1636 55.5089 61.8303 57.7756 59.297C62.4423 53.9636 68.5756 53.1636 73.6423 57.297C75.2422 58.6303 80.7089 68.097 85.5089 78.2303L94.4423 96.7636L96.7089 89.297C99.6423 79.297 105.909 70.2303 113.376 64.6303C120.576 59.297 134.042 54.7636 142.309 54.7636C145.509 54.7636 148.176 54.097 148.176 53.4303ZM102.576 128.097L86.9756 94.097L71.5089 60.2303L66.8423 60.097C62.3089 60.097 61.9089 60.497 57.7756 68.897L53.3756 77.697L58.9756 85.297C65.1089 93.5636 88.3089 117.03 96.9756 123.83L102.576 128.097ZM180.842 86.7636C178.442 77.0303 169.909 67.697 159.642 63.4303C148.176 58.6303 130.442 59.9636 120.176 66.3636C100.042 78.897 94.1756 107.697 107.642 127.964C116.976 142.23 138.176 148.897 156.976 143.43C172.576 139.03 182.842 123.43 182.842 104.364V97.4303H162.842H142.842V106.897V116.364L151.509 115.83C158.842 115.43 160.176 115.697 159.909 117.297C159.109 121.297 150.842 125.43 143.642 125.43C130.576 125.43 122.842 117.297 122.842 103.43C122.842 88.7636 130.442 80.097 143.376 80.097C150.309 80.097 155.109 82.2303 158.576 86.897C159.776 88.7636 162.576 89.297 170.976 89.697L181.642 90.097L180.842 86.7636ZM240.176 80.7636V71.0303V61.4303H213.509H186.842V103.43V145.43H214.176H241.509V136.097V126.764H224.976H208.309V119.43V112.097H222.976H237.509V102.097V92.097H222.842H208.176V85.9636V79.8303L224.176 80.3636L240.176 80.7636ZM146.576 92.097C152.576 92.097 154.309 90.097 150.709 87.5636C147.376 85.297 141.242 84.897 136.576 86.7636C128.176 90.2303 125.242 107.03 131.642 114.63C135.642 119.43 141.242 120.497 138.842 116.23C138.176 114.764 137.509 110.364 137.509 106.364C137.509 97.697 140.976 92.097 146.576 92.097ZM206.976 150.764C189.242 150.764 186.976 150.497 184.976 148.23C183.642 146.764 182.309 142.897 181.776 139.43L180.842 133.297L176.842 137.43C169.642 145.03 158.442 150.097 147.242 151.03C141.376 151.43 142.976 153.03 154.042 158.097C181.242 170.497 204.709 173.83 217.509 167.03C221.776 164.63 228.709 154.097 227.376 151.83C226.976 151.297 217.776 150.764 206.976 150.764Z" fill="white"/>
            </svg> -->
            <Br><Br><Br>
            <div>Who are you Awge?</div>
        </div>
        <div id="root"></div>
        <script>
            setTimeout(()=>{
                if (document.getElementById('woof')) {
                    document.getElementById('woof').style.opacity = '1'
                }
            }
            , 5000)
        </script>
    </body>
</html>


