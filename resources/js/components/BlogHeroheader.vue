<script setup> // workplace Andreas
import { onMounted } from 'vue';

onMounted(()=>{


const digits = document.querySelectorAll('.aa, .ca, .ab, .cb, .bc, .cc, .cd, .ae, .ce, .bf, .ag, .cg, .ah, .ch, .ai, .bi, .aj, .ak, .bk, .al, .bl, .am, .an, .bo, .cp, .aq, .cq, .cr, .as, .bs, .at, .au, .cv, .bw, .cx, .bx, .ay, .az, .bz');

function getRandomDigits() {
  const randomDigits = [];
  for (let i = 0; i < digits.length * 0.2; i++) {
    const index = Math.floor(Math.random() * digits.length);
    randomDigits.push(digits[index]);
  }
  return randomDigits;
}

function toggleOpacity() {
  const randomDigits = getRandomDigits();
  randomDigits.forEach(digit => {
    digit.classList.toggle('hidden');
  });
}

setInterval(toggleOpacity, 1000);
}) 
</script>



<template>
<div class="container">
    <div class="img-container">
        <img src="/public/img/Logo-new.png" width="553" height="325" alt="tech-blog logo">
    </div>

        <div class="hero-text">
            <h1>Blogbeiträge, News</h1>
            <p>und Informationen</p>
        </div>

        <div class="matrix-container">
            <div class="aa">0</div>
            <div class="ab">0</div>
            <div class="ac">1</div>
            <div class="ad">0</div>
            <div class="ae">1</div>
            <div class="af">1</div>
            <div class="ag">0</div>
            <div class="ah">0</div>
            <div class="ai">0</div>
            <div class="aj">1</div>
            <div class="ak">0</div>
            <div class="al">1</div>
            <div class="am">0</div>
            <div class="an">1</div>
            <div class="ao">0</div>
            <div class="ap">1</div>
            <div class="aq">0</div>
            <div class="ar">1</div>
            <div class="as">0</div>
            <div class="at">1</div>
            <div class="au">1</div>
            <div class="av">0</div>
            <div class="aw">0</div>
            <div class="ax">1</div>
            <div class="ay">1</div>
            <div class="az">0</div>
            <div class="ba">1</div>
            <div class="bb">0</div>
            <div class="bc">1</div>
            <div class="bd">1</div>
            <div class="be">0</div>
            <div class="bf">0</div>
            <div class="bg">0</div>
            <div class="bh">0</div>
            <div class="bi">1</div>
            <div class="bj">1</div>
            <div class="bk">0</div>
            <div class="bl">1</div>
            <div class="bm">0</div>
            <div class="bn">0</div>
            <div class="bo">1</div>
            <div class="bp">1</div>
            <div class="bq">1</div>
            <div class="br">1</div>
            <div class="bs">1</div>
            <div class="bt">0</div>
            <div class="bu">1</div>
            <div class="bv">0</div>
            <div class="bw">1</div>
            <div class="bx">1</div>
            <div class="by">0</div>
            <div class="bz">0</div>
            <div class="ca">0</div>
            <div class="cb">0</div>
            <div class="cc">1</div>
            <div class="cd">1</div>
            <div class="ce">0</div>
            <div class="cf">1</div>
            <div class="cg">0</div>
            <div class="ch">0</div>
            <div class="ci">1</div>
            <div class="cj">1</div>
            <div class="ck">0</div>
            <div class="cl">1</div>
            <div class="cm">1</div>
            <div class="cn">0</div>
            <div class="co">0</div>
            <div class="cp">0</div>
            <div class="cq">1</div>
            <div class="cr">0</div>
            <div class="cs">1</div>
            <div class="ct">0</div>
            <div class="cu">1</div>
            <div class="cv">1</div>
            <div class="cw">0</div>
            <div class="cx">1</div>
            <div class="cy">0</div>
            <div class="cz">1</div>
        </div>
</div>
</template>


<style scoped>
* {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    color: aliceblue;
}


.img-container {
    margin: 0 0 0 100px;
    
}

.hero-text {
    margin: 0 0 0 150px;
    
}

h1 {
    font-size: 48px;
    margin: 0;
}

p {
    font-size: 32px;
    margin: 0;
}

.hidden {
    display: none;
  }

.matrix-container {
    position: fixed;
    right: 20px;
    top: 20%;
    transform: translateY(-50%);
    width: 750px;
    height: 250px;
    background-color: transparent;
} 

.aa {
    position: absolute;
    top: 0px;
    left: 3px;
    color: rgb(168, 83, 247);
    font-size: 80px;
    font-weight: 900;
    opacity: 0.7;
}

.ab {
    position: absolute;
    top: 35px;
    left: 75px;
    color: rgb(47, 145, 231);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.ac {
    position: absolute;
    top: 115px;
    left: 33px;
    color: rgb(17, 180, 244);
    font-size: 35px;
    font-weight: 900;
    opacity: 0.7;
}

.ad {
    position: absolute;
    top: 50px;
    left: 100px;
    color: rgb(47, 145, 231);
    font-size: 60px;
    font-weight: 900;
    opacity: 0.9;
}

.ae {
    position: absolute;
    top: 15px;
    left: 125px;
    color: rgb(168, 83, 247);
    font-size: 100px;
    font-weight: 900;
    opacity: 0.7;
}

.af {
    position: absolute;
    top: 45px;
    left: 175px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.ag {
    position: absolute;
    top: 30px;
    left: 200px;
    color: rgb(47, 145, 231);
    font-size: 30px;
    font-weight: 900;
    opacity: 0.7;
}

.ah {
    position: absolute;
    top: 45px;
    left: 225px;
    color: rgb(47, 145, 231);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.ai {
    position: absolute;
    top: 50px;
    left: 250px;
    color: rgb(47, 145, 231);
    font-size: 80px;
    font-weight: 900;
    opacity: 0.9;
}

.aj {
    position: absolute;
    top: 50px;
    left: 275px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.ak {
    position: absolute;
    top: 50px;
    left: 300px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.al {
    position: absolute;
    top: 18px;
    left: 323px;
    color: rgb(17, 180, 244);
    font-size: 30px;
    font-weight: 900;
    opacity: 0.9;
}

.am {
    position: absolute;
    top: 3px;
    left: 350px;
    color: rgb(17, 180, 244);
    font-size: 100px;
    font-weight: 900;
    opacity: 0.7;
}

.an {
    position: absolute;
    top: 39px;
    left: 548px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.ao {
    position: absolute;
    top: 44px;
    left: 557px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.9;
}

.ap {
    position: absolute;
    top: 20px;
    left: 619px;
    color: rgb(168, 83, 247);
    font-size: 35px;
    font-weight: 900;
    opacity: 0.7;
}

.aq {
    position: absolute;
    top: 20px;
    left: 700px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.ar {
    position: absolute;
    top: 16px;
    left: 646px;
    color: rgb(168, 83, 247);
    font-size:85px;
    font-weight: 900;
    opacity: 0.9;
}

.as {
    position: absolute;
    top: 95px;
    left: 45px;
    color: rgb(17, 180, 244);
    font-size: 40px;
    font-weight: 900;
    opacity: 0.9;
}

.at {
    position: absolute;
    top: 95px;
    left: 70px;
    color: rgb(168, 83, 247);
    font-size: 68px;
    font-weight: 900;
    opacity: 0.7;
}

.au {
    position: absolute;
    top: 119px;
    left: 426px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.av {
    position: absolute;
    top: 90px;
    left: 125px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.5;
}

.aw {
    position: absolute;
    top: 95px;
    left: 150px;
    color: rgb(17, 180, 244);
    font-size: 55px;
    font-weight: 900;
    opacity: 0.9;
}

.ax {
    position: absolute;
    top: 80px;
    left: 180px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.ay {
    position: absolute;
    top: 70px;
    left: 208px;
    color: rgb(17, 180, 244);
    font-size: 35px;
    font-weight: 900;
    opacity: 0.9;
}

.az {
    position: absolute;
    top: 60px;
    left: 200px;
    color: rgb(17, 180, 244);
    font-size: 110px;
    font-weight: 900;
    opacity: 0.5;
}

.ba {
    position: absolute;
    top: 100px;
    left: 255px;
    color: rgb(168, 83, 247);
    font-size: 55px;
    font-weight: 900;
    opacity: 1;
}

.bb {
    position: absolute;
    top: 100px;
    left: 285px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bc {
    position: absolute;
    top: 47px;
    left: 322px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.5;
}

.bd {
    position: absolute;
    top: 75px;
    left: 350px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 1;
}

.be {
    position: absolute;
    top: 59px;
    left: 392px;
    color: rgb(17, 180, 244);
    font-size: 55px;
    font-weight: 900;
    opacity: 0.5;
}

.bf {
    position: absolute;
    top: 90px;
    left: 390px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bg {
    position: absolute;
    top: 113px;
    left: 441px;
    color: rgb(17, 180, 244);
    font-size: 85px;
    font-weight: 900;
    opacity: 0.6;
}

.bh {
    position: absolute;
    top: 110px;
    left: 650px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bi {
    position: absolute;
    top: 141px;
    left: 242px;
    color: rgb(17, 180, 244);
    font-size: 95px;
    font-weight: 900;
    opacity: 0.7;
}

.bj {
    position: absolute;
    top: 181px;
    left: 95px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bk {
    position: absolute;
    top: 106px;
    left: 231px;
    color: rgb(168, 83, 247);
    font-size: 30px;
    font-weight: 900;
    opacity: 0.9;
}

.bl {
    position: absolute;
    top: 140px;
    left: 145px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.bm {
    position: absolute;
    top: 130px;
    left: 175px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bn {
    position: absolute;
    top: 145px;
    left: 200px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bo {
    position: absolute;
    top: 150px;
    left: 225px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.6;
}

.bp {
    position: absolute;
    top: 194px;
    left: 243px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bq {
    position: absolute;
    top: 135px;
    left: 280px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.9;
}

.br {
    position: absolute;
    top: 130px;
    left: 315px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bs {
    position: absolute;
    top: 108px;
    left: 338px;
    color: rgb(168, 83, 247);
    font-size: 85px;
    font-weight: 900;
    opacity: 0.9;
}

.bt {
    position: absolute;
    top: 130px;
    left: 385px;
    color: rgb(168, 83, 247);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.7;
}

.bu {
    position: absolute;
    top: 147px;
    left: 468px;
    color: rgb(168, 83, 247);
    font-size: 70px;
    font-weight: 900;
    opacity: 0.9;
}

.bv {
    position: absolute;
    top: 145px;
    left: 640px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bw {
    position: absolute;
    top: 180px;
    left: 400px;
    color: rgb(17, 180, 244);
    font-size: 55px;
    font-weight: 900;
    opacity: 0.9;
}

.bx {
    position: absolute;
    top: 165px;
    left: 170px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.by {
    position: absolute;
    top: 175px;
    left: 310px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.7;
}

.bz {
    position: absolute;
    top: 36px;
    left: 440px;
    color: rgb(168, 83, 247);
    font-size: 120px;
    font-weight: 900;
    opacity: 0.6;
}

.ca {
    position: absolute;
    top: 184px;
    left: 41px;
    color: rgb(17, 180, 244);
    font-size: 40px;
    font-weight: 900;
    opacity: 0.6;
}

.cb {
    position: absolute;
    top: 78px;
    left: 311px;
    color: rgb(17, 180, 244);
    font-size: 83px;
    font-weight: 900;
    opacity: 0.4;
}

.cc {
    position: absolute;
    top: 104px;
    left: 95px;
    color: rgb(17, 180, 244);
    font-size: 100px;
    font-weight: 900;
    opacity: 0.4;
}

.cd {
    position: absolute;
    top: 164px;
    left: 515px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 1;
}

.ce {
    position: absolute;
    top: 180px;
    left: 185px;
    color: rgb(17, 180, 244);
    font-size: 55px;
    font-weight: 900;
    opacity: 0.5;
}

.cf {
    position: absolute;
    top: 199px;
    left: 658px;
    color: rgb(168, 83, 247);
    font-size: 30px;
    font-weight: 900;
    opacity: 0.7;
}

.cg {
    position: absolute;
    top: 88px;
    left: 499px;
    color: rgb(17, 180, 244);
    font-size: 100px;
    font-weight: 900;
    opacity: 0.4;
}

.ch {
    position: absolute;
    top: 180px;
    left: 150px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.8;
}

.ci {
    position: absolute;
    top: 152px;
    left: 431px;
    color: rgb(17, 180, 244);
    font-size: 75px;
    font-weight: 900;
    opacity: 0.7;
}

.cj {
    position: absolute;
    top: 170px;
    left: 17px;
    color: rgb(168, 83, 247);
    font-size: 26px;
    font-weight: 900;
    opacity: 0.9;
}

.ck {
    position: absolute;
    top: -7px;
    left: 496px;
    color: rgb(168, 83, 247);
    font-size: 75px;
    font-weight: 900;
    opacity: 0.6;
}

.cl {
    position: absolute;
    top: 166px;
    left: 551px;
    color: rgb(17, 180, 244);
    font-size: 30px;
    font-weight: 900;
    opacity: 0.7;
}

.cm {
    position: absolute;
    top: 54px;
    left: 427px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.cn {
    position: absolute;
    top: 82px;
    left: 490px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.co {
    position: absolute;
    top: 207px;
    left: 482px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.6;
}

.cp {
    position: absolute;
    top: 109px;
    left: 557px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.cq {
    position: absolute;
    top: 92px;
    left: 589px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.7;
}

.cr {
    position: absolute;
    top: 113px;
    left: 361px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.cs {
    position: absolute;
    top: 114px;
    left: 565px;
    color: rgb(168, 83, 247);
    font-size: 100px;
    font-weight: 900;
    opacity: 0.9;
}

.ct {
    position: absolute;
    top: 169px;
    left: 529px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.7;
}

.cu {
    position: absolute;
    top: 56px;
    left: 513px;
    color: rgb(168, 83, 247);
    font-size: 90px;
    font-weight: 900;
    opacity: 0.9;
}

.cv {
    position: absolute;
    top: 165px;
    left: 685px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.cw {
    position: absolute;
    top: 152px;
    left: 498px;
    color: rgb(168, 83, 247);
    font-size: 30px;
    font-weight: 900;
    opacity: 0.7;
}

.cx {
    position: absolute;
    top: 100px;
    left: 414px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.8;
}

.cy {
    position: absolute;
    top: 28px;
    left: 594px;
    color: rgb(168, 83, 247);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.6;
}

.cz {
    position: absolute;
    top: 19px;
    left: 464px;
    color: rgb(17, 180, 244);
    font-size: 80px;
    font-weight: 900;
    opacity: 0.7;
}


@media screen and (max-width: 1419px) {

    .matrix-container {
    position: fixed;
    right: 20px;
    top: 20%;
    transform: translateY(-50%);
    width: 550px;
    height: 250px;
    background-color: transparent;
    }


    .an {
        display: none;        
    }

    .ao {
        display: none;
    }

    .ap {
        display: none;
    }

    .aq {
        display: none;
    }

    .ar {
        display: none;
    }

    .au {
        display: none;
    }

    .bh {
        display: none;
    }

    .bu {
        display: none;
    }

    .bv {  
        display: none;
    }

    .bz {
        display: none;
    }

    .cd {
        display: none;
    }

    .cf {
        display: none;
    }

    .cg {
        display: none;
    }

    .ck {
        display: none;
    }

    .cl {
        display: none;
    }

    .cp {
        display: none;
    }

    .cq {
        display: none;
    }

    .cs {
        display: none;
    }

    .ct {
        display: none;
    }

    .cu {
        display: none;
    }

    .cv {
        display: none;
    }

    .cy {
        display: none;
    }
}


@media screen and (max-width: 1210px){

    img {
        width: 276px;
        height: 160px;
    }

    h1 {
        font-size: 24px;
    }

    p {
        font-size: 16px;
    }

    .matrix-container {
    display: none;
    }

    .img-container {
    margin: 0 0 0 50px;
    
    }

    .hero-text {
    margin: 0 0 0 75px;
    
    }
}

</style>