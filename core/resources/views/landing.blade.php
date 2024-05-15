<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" as="style" type="text/css">

    <title>Welcome to my page</title>
</head>

<body>
    <div class="block p2 mb_p0">
        <div class="tx_bg4 tx_w_black tx_al_ct" style="color: darkcyan;">
            Profile
        </div>
        <div class="tx_w_bolder tx_al_ct">
            I'm a full-stack web developer
        </div>

        <div class="flex flex_gap1 y_start x_between mt6 mxa tb_flex_col mb_flex_col" style="max-width: 1350px;">
            <div class="flex_child mb_p2">
                <div class="tx_bg0c5 tx_w_bolder">
                    Details
                </div>
                <div class="mt1" style="font-weight: 700;">
                    Name:
                </div>
                <div>
                    Muhammad Rifky Alfian
                </div>

                <div class="mt1" style="font-weight: 700;">
                    Birth date:
                </div>
                <div>
                    18 March 2001
                </div>

                <div class="mt1" style="font-weight: 700;">
                    Location:
                </div>
                <div>
                    Karawang, West Java, Indonesia
                </div>

                <div class="flex flex_gap1 y_center x_start mt2">
                    <a href="https://instagram.com/ralfia01" target="_blank" style="font-size: 1.5rem;">
                        <i class="ri-instagram-line"></i>
                    </a>
                    <a href="mailto:ralfian096.project@gmail.com" target="_blank" style="font-size: 1.5rem;">
                        <i class="ri-mail-line"></i>
                    </a>
                    <a href="https://facebook.com/rifky.alfian.79" target="_blank" style="font-size: 1.5rem;">
                        <i class="ri-facebook-circle-line"></i>
                    </a>
                </div>
            </div>

            <div class="flex_child mb_p2">
                <div class="tx_bg0c5 tx_w_bolder">
                    About me
                </div>
                <div class="mt1">
                    I am a Full-Stack Web Developer with almost 3 years of experience in the web development industry.
                    <br><br>
                    I have expertise in developing end-to-end solutions that cover the gamut of technologies. From designing attractive user interfaces to building powerful backends
                </div>

                <a href="https://wa.me/6287886716522" class="cta1 mt4 mxa">
                    CONTACT ME
                </a>
            </div>

            <div class="flex_child dk_ml5 tb_mt10 tb_mxa mb_mt10 mb_mxa">
                <div class="block p2 tx_al_ct" style="background: darkorange; color: white;">
                    <img class="borad_circle" src="{{ asset('storage/my_pic2.png') }}" alt="" style="width: 200px; height: 200px; background: rgb(240, 240, 240); transform: translateY(-50%); object-fit: cover">

                    <div class="tx_bg1 tx_w_bolder" style="text-transform: uppercase; margin-top:-80px;">
                        Hello, I'm Rifky
                    </div>

                    <div class="tx_sm1 mt2">
                        I am a full-stack developer who specializes in developing end-to-end solutions that cover the gamut of technologies. From designing attractive user interfaces to building powerful backends
                    </div>

                    <div class="flex flex_gap1 y_center x_center mt3 mb4" style="font-size: 1.6rem; font-weight: normal;">
                        <a href="https://instagram.com/ralfia01" target="_blank" style="font-size: inherit; font-weight: inherit;">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="mailto:ralfian096.project@gmail.com" target="_blank" style="font-size: inherit; font-weight: inherit;">
                            <i class="ri-mail-fill"></i>
                        </a>
                        <a href="https://facebook.com/rifky.alfian.79" target="_blank" style="font-size: inherit; font-weight: inherit;">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://linkedin.com/in/m-rifky-alfian/" target="_blank" style="font-size: inherit; font-weight: inherit;">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // 
        document.querySelector('img#img_profile').addEventListener('load', function() {

            setTimeout(() => {

                this.removeAttribute('loading');
            }, 500);
        });
    </script>
</body>

</html>