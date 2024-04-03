<script setup> // workplace Andreas
import { onMounted } from 'vue';

onMounted(()=>{


const digits = document.querySelectorAll('.ca, .ab, .bc, .cd, .ae, .bf, .ag, .cg, .ah, .ai, .aj, .ak, .bk, .al, .am, .an, .bo, .cp, .aq, .cq, .cr, .as, .bs, .at, .au, .cv, .bw, .cx, .ay, .az, .bz');

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
<div>

    <div class="img-container">
        <img src="/public/img/Frame 10.png" alt="tech-blog logo">
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
    display: flex;
}

.hidden {
    display: none;
  }

.matrix-container {
    position: absolute;
    width: 550px;
    height: 350px;
    background-color: transparent;
    top: 50px;
    left: 800px;
}

.aa {
    position: absolute;
    top: 25px;
    left: 30px;
    color: rgb(168, 83, 247);
    font-size: 80px;
    font-weight: 900;
    opacity: 0.9;
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
    top: 70px;
    left: 76px;
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
    top: 50px;
    left: 200px;
    color: rgb(47, 145, 231);
    font-size: 45px;
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
    top: 45px;
    left: 325px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.am {
    position: absolute;
    top: 25px;
    left: 335px;
    color: rgb(17, 180, 244);
    font-size: 100px;
    font-weight: 900;
    opacity: 0.7;
}

.an {
    position: absolute;
    top: 55px;
    left: 385px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.ao {
    position: absolute;
    top: 45px;
    left: 410px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.9;
}

.ap {
    position: absolute;
    top: 42px;
    left: 435px;
    color: rgb(168, 83, 247);
    font-size: 35px;
    font-weight: 900;
    opacity: 0.7;
}

.aq {
    position: absolute;
    top: 70px;
    left: 435px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.ar {
    position: absolute;
    top: 30px;
    left: 460px;
    color: rgb(168, 83, 247);
    font-size:93px;
    font-weight: 900;
    opacity: 0.9;
}

/*-------------------------zweite linie ------------------------*/

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
    top: 95px;
    left: 100px;
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
    top: 120px;
    left: 190px;
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
    top: 80px;
    left: 305px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.5;
}

.bd {
    position: absolute;
    top: 90px;
    left: 335px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 1;
}

.be {
    position: absolute;
    top: 90px;
    left: 360px;
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
    top: 90px;
    left: 415px;
    color: rgb(17, 180, 244);
    font-size: 85px;
    font-weight: 900;
    opacity: 0.6;
}

.bh {
    position: absolute;
    top: 110px;
    left: 465px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bi {
    position: absolute;
    top: 130px;
    left: 25px;
    color: rgb(17, 180, 244);
    font-size: 95px;
    font-weight: 900;
    opacity: 0.7;
}

.bj {
    position: absolute;
    top: 150px;
    left: 75px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bk {
    position: absolute;
    top: 130px;
    left: 100px;
    color: rgb(168, 83, 247);
    font-size: 75px;
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
    top: 145px;
    left: 250px;
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
    top: 120px;
    left: 330px;
    color: rgb(168, 83, 247);
    font-size: 140px;
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
    top: 130px;
    left: 425px;
    color: rgb(168, 83, 247);
    font-size: 90px;
    font-weight: 900;
    opacity: 0.9;
}

.bv {
    position: absolute;
    top: 145px;
    left: 465px;
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
    top: 160px;
    left: 215px;
    color: rgb(168, 83, 247);
    font-size: 120px;
    font-weight: 900;
    opacity: 0.6;
}

.ca {
    position: absolute;
    top: 170px;
    left: 65px;
    color: rgb(17, 180, 244);
    font-size: 55px;
    font-weight: 900;
    opacity: 0.6;
}

.cb {
    position: absolute;
    top: 190px;
    left: 280px;
    color: rgb(17, 180, 244);
    font-size: 55px;
    font-weight: 900;
    opacity: 0.9;
}

.cc {
    position: absolute;
    top: 180px;
    left: 100px;
    color: rgb(17, 180, 244);
    font-size: 120px;
    font-weight: 900;
    opacity: 0.9;
}

.cd {
    position: absolute;
    top: 225px;
    left: 300px;
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
    top: 210px;
    left: 470px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.cg {
    position: absolute;
    top: 190px;
    left: 415px;
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
    top: 235px;
    left: 205px;
    color: rgb(17, 180, 244);
    font-size: 75px;
    font-weight: 900;
    opacity: 0.7;
}

.cj {
    position: absolute;
    top: 240px;
    left: 55px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.ck {
    position: absolute;
    top: 205px;
    left: 80px;
    color: rgb(168, 83, 247);
    font-size: 75px;
    font-weight: 900;
    opacity: 0.6;
}

.cl {
    position: absolute;
    top: 220px;
    left: 160px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.cm {
    position: absolute;
    top: 270px;
    left: 175px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.cn {
    position: absolute;
    top: 255px;
    left: 260px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.co {
    position: absolute;
    top: 250px;
    left: 325px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.6;
}

.cp {
    position: absolute;
    top: 245px;
    left: 360px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.7;
}

.cq {
    position: absolute;
    top: 235px;
    left: 280px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.7;
}

.cr {
    position: absolute;
    top: 280px;
    left: 35px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.cs {
    position: absolute;
    top: 245px;
    left: 460px;
    color: rgb(168, 83, 247);
    font-size: 100px;
    font-weight: 900;
    opacity: 0.9;
}

.ct {
    position: absolute;
    top: 270px;
    left: 385px;
    color: rgb(17, 180, 244);
    font-size: 65px;
    font-weight: 900;
    opacity: 0.7;
}

.cu {
    position: absolute;
    top: 250px;
    left: 125px;
    color: rgb(168, 83, 247);
    font-size: 90px;
    font-weight: 900;
    opacity: 0.9;
}

.cv {
    position: absolute;
    top: 165px;
    left: 500px;
    color: rgb(17, 180, 244);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.cw {
    position: absolute;
    top: 280px;
    left: 300px;
    color: rgb(168, 83, 247);
    font-size: 55px;
    font-weight: 900;
    opacity: 0.7;
}

.cx {
    position: absolute;
    top: 280px;
    left: 70px;
    color: rgb(168, 83, 247);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.8;
}

.cy {
    position: absolute;
    top: 10px;
    left: 395px;
    color: rgb(168, 83, 247);
    font-size: 75px;
    font-weight: 900;
    opacity: 0.6;
}

.cz {
    position: absolute;
    top: 260px;
    left: 335px;
    color: rgb(17, 180, 244);
    font-size: 80px;
    font-weight: 900;
    opacity: 0.7;
}

</style>