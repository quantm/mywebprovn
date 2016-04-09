<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src='/js/Ajax/AjaxEngine.js'></script>
	<title><?= $title ?></title>
        <script>
var videoElement = document.getElementById("selectedColor");    
  function toggleFullScreen() {
    if (!document.mozFullScreen && !document.webkitFullScreen) {
      if (videoElement.mozRequestFullScreen) {
        videoElement.mozRequestFullScreen();
      } else {
        videoElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    } else {
      if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else {
        document.webkitCancelFullScreen();
      }
    }
  }
		</script>
		<?php foreach ($pos as $key): ?>
            <style type="text/css">
                #xe1_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['xe1_a_left'] ?>px;
                    top: <?= $key['xe1_a_top'] ?>px;
                    transition-property: all;
                }

                #ma1_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['ma1_a_left'] ?>px;
                    top: <?= $key['ma1_a_top'] ?>px;
                    transition-property: all;
                }

                #bo1_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['bo1_a_left'] ?>px;
                    top: <?= $key['bo1_a_top'] ?>px;
                    transition-property: all;
                }

                #si1_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['si1_a_left'] ?>px;
                    top: <?= $key['si1_a_top'] ?>px;
                    transition-property: all;
                }


                #tuong_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['tuong_a_left'] ?>px;
                    top: <?= $key['tuong_a_top'] ?>px;
                    transition-property: all;
                }

                #tuong_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['tuong_b_left'] ?>px;
                    top: <?= $key['tuong_b_top'] ?>px;
                    transition-property: all;
                }


                #ma2_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['ma2_a_left'] ?>px;
                    top: <?= $key['ma2_a_top'] ?>px;
                    transition-property: all;
                }

                #si2_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['si2_a_left'] ?>px;
                    top: <?= $key['si2_a_top'] ?>px;
                    transition-property: all;
                }

                #si1_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['si1_b_left'] ?>px;
                    top: <?= $key['si1_b_top'] ?>px;
                    transition-property: all;
                }

                #si2_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['si2_b_left'] ?>px;
                    top: <?= $key['si2_b_top'] ?>px;
                    transition-property: all;
                }

                #bo1_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['bo1_b_left'] ?>px;
                    top: <?= $key['bo1_b_top'] ?>px;
                    transition-property: all;
                }

                #bo2_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['bo2_b_left'] ?>px;
                    top:<?= $key['bo2_b_top'] ?>px;
                    transition-property: all;
                }

                #bo2_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['bo2_a_left'] ?>px;
                    top:<?= $key['bo2_a_top'] ?>px;
                    transition-property: all;
                }


                #ma1_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left:<?= $key['ma1_b_left'] ?>px;
                    top:<?= $key['ma1_b_top'] ?>px;
                    transition-property: all;
                }

                #ma2_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['ma2_b_left'] ?>px;
                    top: <?= $key['ma2_b_top'] ?>px;
                    transition-property: all;
                }


                #xe2_a {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['xe2_a_left'] ?>px;
                    top: <?= $key['xe2_a_top'] ?>px;
                    transition-property: all;
                }

                #xe1_b {
                    position: absolute;
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['xe1_b_left'] ?>px;
                    top:<?= $key['xe1_b_top'] ?>px;
                    transition-property: all;
                }

                #xe2_b {
                    position: absolute;	
                    width: 60px;
                    height: 60px;
                    z-index: 1;
                    left: <?= $key['xe2_b_left'] ?>px;
                    top: <?= $key['xe2_b_top'] ?>px;
                    transition-property: all;
                }
                #apDiv1 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 375px;
	top: 53px;
                }
            #apDiv2 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 476px;
	top: 61px;
}
            #apDiv3 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 596px;
	top: 106px;
}
            #apDiv4 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 870px;
	top: 104px;
}
            #apDiv5 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 718px;
	top: 174px;
}
            #apDiv6 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 733px;
	top: 104px;
}
            #apDiv7 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 802px;
	top: 106px;
}
            #apDiv8 {
	position: absolute;
	width: 48px;
	height: 42px;
	z-index: 2;
	left: 943px;
	top: 55px;
}
            #apDiv9 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 477px;
	top: 105px;
}
            #apDiv10 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 529px;
	top: 104px;
}
            #apDiv11 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 459px;
	top: 177px;
}
            #apDiv12 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 720px;
	top: 303px;
}
            #apDiv13 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 46px;
	top: 605px;
}
            #apDiv14 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 373px;
	top: 104px;
}
            #apDiv15 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 853px;
	top: 516px;
}
            #apDiv16 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 527px;
	top: 64px;
}
            #apDiv17 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 595px;
	top: 63px;
}
            #apDiv18 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 666px;
	top: 66px;
}
            #apDiv19 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 855px;
	top: 176px;
}
            #apDiv20 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 867px;
	top: 65px;
}
            #apDiv21 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 583px;
	top: 302px;
}
            #apDiv22 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 906px;
	top: 301px;
}
            #apDiv23 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 856px;
	top: 300px;
}
            #apDiv24 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 788px;
	top: 302px;
}
            #apDiv25 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 787px;
	top: 176px;
}
            #apDiv26 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 800px;
	top: 66px;
}
            #apDiv27 {
	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 541px;
	top: 288px;
}
            #apDiv28 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 650px;
	top: 178px;
}
            #apDiv29 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 513px;
	top: 177px;
}
            #apDiv30 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 581px;
	top: 176px;
}
            #apDiv31 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 924px;
	top: 105px;
}
            #apDiv32 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 373px;
	top: 176px;
}
            #apDiv33 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 716px;
	top: 375px;
}
            #apDiv34 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 787px;
	top: 377px;
}
            #apDiv35 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 854px;
	top: 375px;
}
            #apDiv36 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 647px;
	top: 375px;
}
            #apDiv37 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 852px;
	top: 646px;
}
            #apDiv38 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 666px;
	top: 105px;
}
            #apDiv39 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 649px;
	top: 585px;
}
            #apDiv40 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 583px;
	top: 376px;
}
            #apDiv41 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 927px;
	top: 174px;
}
            #apDiv42 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 581px;
	top: 244px;
}
            #apDiv43 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 650px;
	top: 302px;
}
            #apDiv44 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 720px;
	top: 245px;
}
            #apDiv45 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 787px;
	top: 245px;
}
            #apDiv46 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 907px;
	top: 243px;
}
            #apDiv47 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 855px;
	top: 243px;
}
            #apDiv48 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 904px;
	top: 375px;
}
            #apDiv49 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 541px;
	top: 288px;
}
            #apDiv50 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 443px;
	top: 447px;
}
            #apDiv51 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 375px;
	top: 241px;
}

            #apDiv111 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 374px;
	top: 307px;
}
            #apDiv52 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 442px;
	top: 243px;
}
            #apDiv53 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 902px;
	top: 447px;
}
            #apDiv54 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 854px;
	top: 449px;
}
            #apDiv55 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 784px;
	top: 450px;
}
            #apDiv56 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 716px;
	top: 447px;
}
            #apDiv57 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 650px;
	top: 444px;
}
            #apDiv58 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 582px;
	top: 448px;
}
            #apDiv59 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 515px;
	top: 447px;
}
            #apDiv60 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 373px;
	top: 581px;
}
            #apDiv61 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 732px;
	top: 64px;
}
            #apDiv62 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 514px;
	top: 246px;
}
            #apDiv63 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 373px;
	top: 448px;
}
            #apDiv64 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 442px;
	top: 304px;
}
            #apDiv65 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 513px;
	top: 302px;
}
            #apDiv66 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 786px;
	top: 586px;
}
            #apDiv67 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 854px;
	top: 584px;
}
            #apDiv68 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 448px;
	top: 640px;
}
            #apDiv69 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 902px;
	top: 514px;
}
            #apDiv70 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 653px;
	top: 517px;
}
            #apDiv71 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 373px;
	top: 516px;
}
            #apDiv72 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 717px;
	top: 518px;
}
            #apDiv73 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 649px;
	top: 244px;
}
            #apDiv74 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 374px;
	top: 634px;
}
            #apDiv75 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 905px;
	top: 584px;
}
            #apDiv76 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 447px;
	top: 513px;
}
            #apDiv77 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 516px;
	top: 517px;
}
            #apDiv78 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 583px;
	top: 586px;
}
            #apDiv79 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 518px;
	top: 581px;
}
            #apDiv80 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 448px;
	top: 586px;
}
            #apDiv81 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 584px;
	top: 515px;
}
            #apDiv82 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 786px;
	top: 518px;
}
            #apDiv83 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 473px;
	top: 605px;
}
            #apDiv84 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 717px;
	top: 586px;
}
            #apDiv85 {position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 473px;
	top: 537px;
}
            #apDiv86 {position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 473px;
	top: 537px;
}
            #apDiv87 {position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 473px;
	top: 537px;
}
            #apDiv88 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 521px;
	top: 642px;
}
            #apDiv89 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 582px;
	top: 643px;
}
            #apDiv90 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 650px;
	top: 645px;
}
            #apDiv91 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 715px;
	top: 645px;
}
            #apDiv92 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 783px;
	top: 644px;
}
            #apDiv93 {
	position: absolute;
	width: 48px;
	height: 30px;
	z-index: 2;
	left: 903px;
	top: 645px;
}
            #apDiv94 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 516px;
	top: 377px;
}
            #apDiv95 {
	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 373px;
	top: 377px;
}
            #apDiv96 {
	position: absolute;
	width: 30px;
	height: 30px;
	z-index: 2;
	left: 442px;
	top: 377px;
}
            #apDiv97 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 607px;
	top: 465px;
}
            #apDiv98 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 607px;
	top: 465px;
}
            #apDiv99 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 607px;
	top: 465px;
}
            #apDiv100 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 406px;
	top: 394px;
}
            #apDiv101 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 406px;
	top: 394px;
}
            #apDiv102 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 406px;
	top: 394px;
}
            #apDiv103 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 268px;
	top: 395px;
}
            #apDiv104 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 268px;
	top: 395px;
}
            #apDiv105 {	position: absolute;
	width:30px;
height: 30px;
	z-index: 2;
	left: 366px;
	top: 537px;
}
            #apDiv106 {	position: absolute;
	width: 50px;
	height: 45px;
	z-index: 2;
	left: 46px;
	top: 260px;
}
            #apDiv107 {
	position: absolute;
	width: 303px;
	height: 50px;
	z-index: 3;
	left: 523px;
	top: 334px;
}
            </style>
        <?php endforeach; ?>
        <script type="text/javascript">
            function move_chess(top,left)
            {
                        var ajax = new AjaxEngine();                        
                        //var top=document.getElementById("apDiv75").offsetTop;
                        //var left=document.getElementById("apDiv75").offsetLeft;
                        var type_request="POST";
                        var url="/game/move_chess/"+top+"/"+left;
                        sendRequestToServer(url,type_request);
                        //window.open('/game/cotuong/', '_parent', 'fullscreen=yes, scrollbars=auto');
            }
           
        </script>
    </head>
    <body onload='toggleFullScreen()'>

    <form id="frmChess" name="frmChess" method="POST">
        <center>
        <div id="selectedColor" style='background-color:#FFF'>
			<script>
  var videoElement = document.getElementById("selectedColor");
    
  function toggleFullScreen() {
    if (!document.mozFullScreen && !document.webkitFullScreen) {
      if (videoElement.mozRequestFullScreen) {
        videoElement.mozRequestFullScreen();
      } else {
        videoElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    } else {
      if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else {
        document.webkitCancelFullScreen();
      }
    }
  }
  
  document.addEventListener("keydown", function(e) {
    if (e.keyCode == 13) {
      toggleFullScreen();
      document.getElementById('apDiv107').style.display='none';
    }
  }, false);
</script>
		<div id="xe1_a"><img src="../../../../images/chess/piece/xe.gif" alt="" width="60" height="60" draggable="auto" /></div>
          <div id="xe2_a"><img src="../../../../images/chess/piece/xe.gif" alt=""  draggable="auto" /></div>
            <img src="../../../../images/chess/piece/bo.gif" alt="" width="60" height="60" id="bo1_a"  draggable="auto" />
            <img src="../../../../images/chess/piece/bo.gif" alt="" width="60" height="60" id="bo2_a"  draggable="auto" />
            <img src="../../../../images/chess/piece/bo_b.gif" alt="" width="60" height="60" id="bo1_b"  draggable="auto" />
            <img src="../../../../images/chess/piece/bo_b.gif" alt="" width="60" height="60" id="bo2_b"  draggable="auto" />
            <img src="../../../../images/chess/piece/ma_b.gif" alt="" width="60" height="60" id="ma1_b"  draggable="auto" />    
            <img src="../../../../images/chess/piece/ma_b.gif" alt="" width="60" height="60" id="ma2_b"  draggable="auto" />    
            <img src="../../../../images/chess/piece/xe_b.gif" alt="" width="60" height="60" id="xe1_b"  draggable="auto" />
            <img src="../../../../images/chess/piece/xe_b.gif" alt="" width="60" height="60" id="xe2_b"  draggable="auto" />
            <img src="../../../../images/chess/piece/xi.gif" alt="" width="60" height="60" id="si1_a"  draggable="auto" />
            <img src="../../../../images/chess/piece/xi.gif" alt="" width="60" height="60" id="si2_a"  draggable="auto" />
            <img src="../../../../images/chess/piece/ma.gif" alt="" width="60" height="60" id="ma1_a"  draggable="auto" />
            <img src="../../../../images/chess/piece/ma.gif" alt="" width="60" height="60" id="ma2_a"  draggable="auto" />
            <img src="../../../../images/chess/piece/xi_b.gif" alt="" width="60" height="60" id="si1_b"  draggable="auto" />
            <img src="../../../../images/chess/piece/xi_b.gif" alt="" width="60" height="60" id="si2_b"  draggable="auto" />
            <img src="../../../../images/chess/piece/tuong.gif" alt="" width="60" height="60" id="tuong_a"  draggable="auto" />
            <img src="../../../../images/chess/piece/tuong_b.gif" alt="" width="60" height="60" id="tuong_b"  draggable="auto" />
            <!-- chess background  -->
        <img style="margin-right:2px;" src="../../../../images/chess/grid.png" />
      <div id="apDiv1" onclick="move_chess(53,375)" >J9</div>
      <div id="apDiv2" onclick="move_chess();" >J8</div>
      <div id="apDiv20" onclick="move_chess();" >J2</div>
      <div id="apDiv21" onclick="move_chess();" >F6</div>
      <div id="apDiv64" onclick="move_chess();" >F8</div>
      <div id="apDiv65" onclick="move_chess();" >F7</div>
      <div id="apDiv66" onclick="move_chess();" >B3</div>
      <div id="apDiv81" onclick="move_chess();" >C6</div>
      <div id="apDiv82" onclick="move_chess();" >C3</div>
      <div id="apDiv67" onclick="move_chess();" >B2</div>
      <div id="apDiv22" onclick="move_chess();" >F1</div>
      <div id="apDiv23" onclick="move_chess();" >F2</div>
      <div id="apDiv3" onclick="move_chess();" >I6</div>
      <div id="apDiv4" onclick="move_chess();" >I2</div>
      <div id="apDiv32" onclick="move_chess();" >H9</div>
      <div id="apDiv5" onclick="move_chess();" >H4</div>
      <div id="apDiv37" onclick="move_chess();" >A2</div>
      <div id="apDiv38" onclick="move_chess();" >I5</div>
      <div id="apDiv6" onclick="move_chess();" >I4</div>
      <div id="apDiv68" onclick="move_chess();" >A8</div>
      <div id="apDiv88" onclick="move_chess();" >A7</div>
      <div id="apDiv89" onclick="move_chess();" >A6</div>
      <div id="apDiv90" onclick="move_chess();" >A5</div>
      <div id="apDiv91" onclick="move_chess();" >A4</div>
      <div id="apDiv92" onclick="move_chess();" >A3</div>
      <div id="apDiv93" onclick="move_chess();" >A1</div>
      <div id="apDiv84" onclick="move_chess();" >B4</div>
      <div id="apDiv7" onclick="move_chess();" >I3</div>
      <div id="apDiv8" onclick="move_chess();" >J1</div>
      <div id="apDiv15" onclick="move_chess();" >C2</div>
      <div id="apDiv16" onclick="move_chess();" >J7</div>
      <div id="apDiv17" onclick="move_chess();" >J6</div>
      <div id="apDiv18" onclick="move_chess();" >J5</div>
      <div id="apDiv19" onclick="move_chess();" >H2</div>
      <div id="apDiv62" onclick="move_chess();" >G7</div>
      <div id="apDiv63" onclick="move_chess();" >D9</div>
      <div id="apDiv69" onclick="move_chess();" >C1</div>
      <div id="apDiv70" onclick="move_chess();" >C5</div>
      <div id="apDiv71" onclick="move_chess();" >C9</div>
      <div id="apDiv73" onclick="move_chess();" >G5</div>
      <div id="apDiv74" onclick="move_chess();" >A9</div>
      <div id="apDiv75" onclick="move_chess();" >B1</div>
      <div id="apDiv9" onclick="move_chess();" >I8</div>
      <div id="apDiv10" onclick="move_chess();" >I7</div>
      <div id="apDiv11" onclick="move_chess();" >H8</div>
      <div id="apDiv28" onclick="move_chess();" >H5</div>
      <div id="apDiv29" onclick="move_chess();" >H7</div>
      <div id="apDiv30" onclick="move_chess();" >H6</div>
      <div id="apDiv31" onclick="move_chess();" >I1</div>
      <div id="apDiv24" onclick="move_chess();" >F3</div>
      <div id="apDiv25" onclick="move_chess();" >H3</div>
      <div id="apDiv26" onclick="move_chess();" >J3</div>
      <div id="apDiv46" onclick="move_chess();" >G1</div>
      <div id="apDiv50" onclick="move_chess();" >D8</div>
      <div id="apDiv51" onclick="move_chess();" >G9</div>
      <div id="apDiv111" onclick="move_chess();" >F9</div>
      <div id="apDiv52" onclick="move_chess();" >G8</div>
      <div id="apDiv47" onclick="move_chess();" >G2</div>
      <div id="apDiv48" onclick="move_chess();" >E1</div>
      <div id="apDiv41" onclick="move_chess();" >H1</div>
      <div id="apDiv42" onclick="move_chess();" >G6</div>
      <div id="apDiv43" onclick="move_chess();" >F5</div>
      <div id="apDiv44" onclick="move_chess();" >G4</div>
      <div id="apDiv53" onclick="move_chess();" >D1</div>
      <div id="apDiv33" onclick="move_chess();" >E4</div>
      <div id="apDiv36" onclick="move_chess();" >E5</div>
      <div id="apDiv40" onclick="move_chess();" >E6</div>
      <div id="apDiv95" onclick="move_chess();" >E9</div>
      <div id="apDiv96" onclick="move_chess();" >E8</div>
      <div id="apDiv94" onclick="move_chess();" >E7</div>
      <div id="apDiv34" onclick="move_chess();" >E3</div>
      <div id="apDiv35" onclick="move_chess();" >E2</div>
      <div id="apDiv54" onclick="move_chess();" >D2</div>
      <div id="apDiv55" onclick="move_chess();" >D3</div>
      <div id="apDiv56" onclick="move_chess();" >D4</div>
      <div id="apDiv57" onclick="move_chess();" >D5</div>
      <div id="apDiv58" onclick="move_chess();" >D6</div>
      <div id="apDiv59" onclick="move_chess();" >D7</div>
      <div id="apDiv60" onclick="move_chess();" >B9</div>
      <div id="apDiv61" onclick="move_chess();" >J4</div>
      <div id="apDiv45" onclick="move_chess();" >G3</div>
      <div id="apDiv39" onclick="move_chess();" >B5</div>
      <div id="apDiv76" onclick="move_chess();" >C8</div>
      <div id="apDiv77" onclick="move_chess();" >C7</div>
      <div id="apDiv78" onclick="move_chess();" >B6</div>
      <div id="apDiv79" onclick="move_chess();" >B7</div>
      <div id="apDiv12" onclick="move_chess();" >F4</div>
      <div id="apDiv80" onclick="move_chess();" >B8</div>
      <div id="apDiv14" onclick="move_chess();" >I9</div>
      <div id="apDiv72" onclick="move_chess();" >C4</div>
      <div id="apDiv107"><img src="../../../../images/chess/start.gif" width="237" height="126" /></div>
        </div>
    </center>
    </form>
	</body>
</html>


