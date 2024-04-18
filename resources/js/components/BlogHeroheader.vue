<script setup>// workplace Andreas
import { onMounted } from 'vue';

onMounted(() => {


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
            // Use setTimeout to toggle the 'hidden' class after a short delay
            setTimeout(() => {
                digit.classList.toggle('hidden');
            }, Math.random() * 200); // Random delay up to 200ms for each digit
        });
    }
    // function toggleOpacity() {
    //     const randomDigits = getRandomDigits();
    //     randomDigits.forEach(digit => {
    //         digit.classList.toggle('hidden');
    //     });
    // }

    setInterval(toggleOpacity, 300);
}) 
</script>



<template>

    <body>
        <div class="heroContainer">
            <div class="container">
                <div class="img-container">
                    <img src="../assets/logo.svg" width="553" height="325" alt="tech-blog logo">
                </div>

                <div class="hero-text">
                    <h1>Blogbeiträge, News</h1>
                    <p>und Informationen</p>
                </div>
            </div>
            <div class="containerOfMatrix">
                <div class="matrix-container" style="color: RGB(80,80,80);">
                    <div class="aa digit">0</div>
                    <div class="ab digit">0</div>
                    <div class="ac digit">1</div>
                    <div class="ad digit">0</div>
                    <div class="ae digit">1</div>
                    <div class="af digit">1</div>
                    <div class="ag digit">0</div>
                    <div class="ah digit">0</div>
                    <div class="ai digit">0</div>
                    <div class="aj digit">1</div>
                    <div class="ak digit">0</div>
                    <div class="al digit">1</div>
                    <div class="am digit">0</div>
                    <div class="an digit">1</div>
                    <div class="ao digit">0</div>
                    <div class="ap digit">1</div>
                    <div class="aq digit">0</div>
                    <div class="ar digit">1</div>
                    <div class="as digit">0</div>
                    <div class="at digit">1</div>
                    <div class="au digit">1</div>
                    <div class="av digit">0</div>
                    <div class="aw digit">0</div>
                    <div class="ax digit">1</div>
                    <div class="ay digit">1</div>
                    <div class="az digit">0</div>
                    <div class="ba digit">1</div>
                    <div class="bb digit">0</div>
                    <div class="bc digit">1</div>
                    <div class="bd digit">1</div>
                    <div class="be digit">0</div>
                    <div class="bf digit">0</div>
                    <div class="bg digit">0</div>
                    <div class="bh digit">0</div>
                    <div class="bi digit">1</div>
                    <div class="bj digit">1</div>
                    <div class="bk digit">0</div>
                    <div class="bl digit">1</div>
                    <div class="bm digit">0</div>
                    <div class="bn digit">0</div>
                    <div class="bo digit">1</div>
                    <div class="bp digit">1</div>
                    <div class="bq digit">1</div>
                    <div class="br digit">1</div>
                    <div class="bs digit">1</div>
                    <div class="bt digit">0</div>
                    <div class="bu digit">1</div>
                    <div class="bv digit">0</div>
                    <div class="bw digit">1</div>
                    <div class="bx digit">1</div>
                    <div class="by digit">0</div>
                    <div class="bz digit">0</div>
                    <div class="ca digit">0</div>
                    <div class="cb digit">0</div>
                    <div class="cc digit">1</div>
                    <div class="cd digit">1</div>
                    <div class="ce digit">0</div>
                    <div class="cf digit">1</div>
                    <div class="cg digit">0</div>
                    <div class="ch digit">0</div>
                    <div class="ci digit">1</div>
                    <div class="cj digit">1</div>
                    <div class="ck digit">0</div>
                    <div class="cl digit">1</div>
                    <div class="cm digit">1</div>
                    <div class="cn digit">0</div>
                    <div class="co digit">0</div>
                    <div class="cp digit">0</div>
                    <div class="cq digit">1</div>
                    <div class="cr digit">0</div>
                    <div class="cs digit">1</div>
                    <div class="ct digit">0</div>
                    <div class="cu digit">1</div>
                    <div class="cv digit">1</div>
                    <div class="cw digit">0</div>
                    <div class="cx digit">1</div>
                    <div class="cy digit">0</div>
                    <div class="cz digit">1</div>
                </div>
            </div>
        </div>

    </body>
</template>


<style scoped>

:root{
    --number-tipe-one:  pink; 
    --number-tipe-two:purple;

    /* --number-tipe-one:  rgb(166, 166, 166); 
    --number-tipe-two:rgb(79, 78, 79);  */
}

* {
    font-family: 'Trebuchet MS',
    'Lucida Sans Unicode',
    'Lucida Grande',
    'Lucida Sans',
    'Arial','sans-serif';
    color: aliceblue;
    }
    
    
    
    

body {
    background: linear-gradient(180deg, rgba(0, 0, 0, 1) 0%, rgba(59, 57, 57, 1) 86%, rgba(109, 109, 109, 1) 100%);
    height: 577px;
   
}

.heroContainer {
    display: flex;
    flex-direction: row;
    align-items: start;
   
}

.containerOfMatrix {
    width: 50vw;

}

.container {
    width: 50vw;
}

.img-container {
    margin: 0 0 0 100px;

}

.hero-text {
    margin: 0 0 0 150px;
    color: aliceblue;

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
    ;
    /* Define the transition effect */
}

/* .hidden {
    display: none;
} */

.matrix-container {
    position: relative;
    right: 20px;
    top: 20%;
    transform: translateY(-50%);
    width: 37vw;
    height: 26px;
    background-color: transparent;
    font-weight: 700;
}

.aa {
    position: absolute;
    top: 0px;
    left: 3px;
    color: var(--number-tipe-two);
    font-size: 80px;
    opacity: 0.7;

}

.ab {
    position: absolute;
    top: 35px;
    left: 75px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.7;

}

.ac {
    position: absolute;
    top: 115px;
    left: 33px;
    color: var(--number-tipe-one);
    font-size: 35px;

    opacity: 0.7;

}

.ad {
    position: absolute;
    top: 50px;
    left: 100px;
    color: var(--number-tipe-one);
    font-size: 60px;

    opacity: 0.9;

}

.ae {
    position: absolute;
    top: 15px;
    left: 125px;
    color: var(--number-tipe-two);
    font-size: 100px;

    opacity: 0.7;

}

.af {
    position: absolute;
    top: 45px;
    left: 175px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;

}

.ag {
    position: absolute;
    top: 30px;
    left: 200px;
    color: var(--number-tipe-one);
    font-size: 30px;

    opacity: 0.7;
}

.ah {
    position: absolute;
    top: 45px;
    left: 225px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;

}

.ai {
    position: absolute;
    top: 50px;
    left: 250px;
    color: var(--number-tipe-one);
    font-size: 80px;

    opacity: 0.9;

}

.aj {
    position: absolute;
    top: 50px;
    left: 275px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.ak {
    position: absolute;
    top: 50px;
    left: 300px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.7;
}

.al {
    position: absolute;
    top: 18px;
    left: 323px;
    color: var(--number-tipe-one);
    font-size: 30px;

    opacity: 0.9;
}

.am {
    position: absolute;
    top: 3px;
    left: 350px;
    color: var(--number-tipe-one);
    font-size: 100px;

    opacity: 0.7;

}

.an {
    position: absolute;
    top: 39px;
    left: 548px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.7;
}

.ao {
    position: absolute;
    top: 44px;
    left: 557px;
    color: var(--number-tipe-one);
    font-size: 65px;

    opacity: 0.9;
}

.ap {
    position: absolute;
    top: 20px;
    left: 619px;
    color: var(--number-tipe-two);
    font-size: 35px;

    opacity: 0.7;

}

.aq {
    position: absolute;
    top: 20px;
    left: 700px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.7;

}

.ar {
    position: absolute;
    top: 16px;
    left: 646px;
    color: var(--number-tipe-two);
    font-size: 85px;

    opacity: 0.9;
}

.as {
    position: absolute;
    top: 95px;
    left: 45px;
    color: var(--number-tipe-one);
    font-size: 40px;

    opacity: 0.9;
}

.at {
    position: absolute;
    top: 95px;
    left: 70px;
    color: var(--number-tipe-two);
    font-size: 68px;

    opacity: 0.7;

}

.au {
    position: absolute;
    top: 119px;
    left: 426px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;
}

.av {
    position: absolute;
    top: 90px;
    left: 125px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.5;
}

.aw {
    position: absolute;
    top: 95px;
    left: 150px;
    color: var(--number-tipe-one);
    font-size: 55px;

    opacity: 0.9;
}

.ax {
    position: absolute;
    top: 80px;
    left: 180px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;
}

.ay {
    position: absolute;
    top: 70px;
    left: 208px;
    color: var(--number-tipe-one);
    font-size: 35px;

    opacity: 0.9;
}

.az {
    position: absolute;
    top: 60px;
    left: 200px;
    color: var(--number-tipe-one);
    font-size: 110px;

    opacity: 0.5;
}

.ba {
    position: absolute;
    top: 100px;
    left: 255px;
    color: var(--number-tipe-two);
    font-size: 55px;

    opacity: 1;
}

.bb {
    position: absolute;
    top: 100px;
    left: 285px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;
}

.bc {
    position: absolute;
    top: 47px;
    left: 322px;
    color: var(--number-tipe-one);
    font-size: 65px;

    opacity: 0.5;
}

.bd {
    position: absolute;
    top: 75px;
    left: 350px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 1;
}

.be {
    position: absolute;
    top: 59px;
    left: 392px;
    color: var(--number-tipe-one);
    font-size: 55px;

    opacity: 0.5;
}

.bf {
    position: absolute;
    top: 90px;
    left: 390px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.bg {
    position: absolute;
    top: 113px;
    left: 441px;
    color: var(--number-tipe-one);
    font-size: 85px;

    opacity: 0.6;
}

.bh {
    position: absolute;
    top: 110px;
    left: 650px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;
}

.bi {
    position: absolute;
    top: 141px;
    left: 242px;
    color: var(--number-tipe-one);
    font-size: 95px;

    opacity: 0.7;
}

.bj {
    position: absolute;
    top: 181px;
    left: 95px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.bk {
    position: absolute;
    top: 106px;
    left: 231px;
    color: var(--number-tipe-two);
    font-size: 30px;

    opacity: 0.9;
}

.bl {
    position: absolute;
    top: 140px;
    left: 145px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.7;
}

.bm {
    position: absolute;
    top: 130px;
    left: 175px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.bn {
    position: absolute;
    top: 145px;
    left: 200px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;
}

.bo {
    position: absolute;
    top: 150px;
    left: 225px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.6;
}

.bp {
    position: absolute;
    top: 194px;
    left: 243px;
    color: var(--number-tipe-two);
    font-size: 45px;
    font-weight: 900;
    opacity: 0.9;
}

.bq {
    position: absolute;
    top: 135px;
    left: 280px;
    color: var(--number-tipe-one);
    font-size: 65px;

    opacity: 0.9;
}

.br {
    position: absolute;
    top: 130px;
    left: 315px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;
}

.bs {
    position: absolute;
    top: 108px;
    left: 338px;
    color: var(--number-tipe-two);
    font-size: 85px;

    opacity: 0.9;
}

.bt {
    position: absolute;
    top: 130px;
    left: 385px;
    color: var(--number-tipe-two);
    font-size: 65px;

    opacity: 0.7;
}

.bu {
    position: absolute;
    top: 147px;
    left: 468px;
    color: var(--number-tipe-two);
    font-size: 70px;

    opacity: 0.9;
}

.bv {
    position: absolute;
    top: 145px;
    left: 640px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.bw {
    position: absolute;
    top: 180px;
    left: 400px;
    color: var(--number-tipe-one);
    font-size: 55px;

    opacity: 0.9;
}

.bx {
    position: absolute;
    top: 165px;
    left: 170px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.by {
    position: absolute;
    top: 175px;
    left: 310px;
    color: var(--number-tipe-one);
    font-size: 65px;

    opacity: 0.7;
}

.bz {
    position: absolute;
    top: 36px;
    left: 440px;
    color: var(--number-tipe-two);
    font-size: 120px;

    opacity: 0.6;
}

.ca {
    position: absolute;
    top: 184px;
    left: 41px;
    color: var(--number-tipe-one);
    font-size: 40px;

    opacity: 0.6;
}

.cb {
    position: absolute;
    top: 78px;
    left: 311px;
    color: var(--number-tipe-one);
    font-size: 83px;

    opacity: 0.4;
}

.cc {
    position: absolute;
    top: 104px;
    left: 95px;
    color: var(--number-tipe-one);
    font-size: 100px;

    opacity: 0.4;
}

.cd {
    position: absolute;
    top: 164px;
    left: 515px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 1;
}

.ce {
    position: absolute;
    top: 180px;
    left: 185px;
    color: var(--number-tipe-one);
    font-size: 55px;

    opacity: 0.5;
}

.cf {
    position: absolute;
    top: 199px;
    left: 658px;
    color: var(--number-tipe-two);
    font-size: 30px;

    opacity: 0.7;
}

.cg {
    position: absolute;
    top: 88px;
    left: 499px;
    color: var(--number-tipe-one);
    font-size: 100px;

    opacity: 0.4;
}

.ch {
    position: absolute;
    top: 180px;
    left: 150px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.8;
}

.ci {
    position: absolute;
    top: 152px;
    left: 431px;
    color: var(--number-tipe-one);
    font-size: 75px;

    opacity: 0.7;
}

.cj {
    position: absolute;
    top: 170px;
    left: 17px;
    color: var(--number-tipe-two);
    font-size: 26px;

    opacity: 0.9;
}

.ck {
    position: absolute;
    top: -7px;
    left: 496px;
    color: var(--number-tipe-two);
    font-size: 75px;

    opacity: 0.6;
}

.cl {
    position: absolute;
    top: 166px;
    left: 551px;
    color: var(--number-tipe-one);
    font-size: 30px;

    opacity: 0.7;
}

.cm {
    position: absolute;
    top: 54px;
    left: 427px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.cn {
    position: absolute;
    top: 82px;
    left: 490px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.co {
    position: absolute;
    top: 207px;
    left: 482px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.6;
}

.cp {
    position: absolute;
    top: 109px;
    left: 557px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.7;
}

.cq {
    position: absolute;
    top: 92px;
    left: 589px;
    color: var(--number-tipe-one);
    font-size: 65px;

    opacity: 0.7;
}

.cr {
    position: absolute;
    top: 113px;
    left: 361px;
    color: var(--number-tipe-one);
    font-size: 45px;

    opacity: 0.9;
}

.cs {
    position: absolute;
    top: 114px;
    left: 565px;
    color: var(--number-tipe-two);
    font-size: 100px;

    opacity: 0.9;
}

.ct {
    position: absolute;
    top: 169px;
    left: 529px;
    color: var(--number-tipe-one);
    font-size: 65px;

    opacity: 0.7;
}

.cu {
    position: absolute;
    top: 56px;
    left: 513px;
    color: var(--number-tipe-two);
    font-size: 90px;

    opacity: 0.9;
}

.cv {
    position: absolute;
    top: 165px;
    left: 685px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.9;
}

.cw {
    position: absolute;
    top: 152px;
    left: 498px;
    color: var(--number-tipe-two);
    font-size: 30px;

    opacity: 0.7;
}

.cx {
    position: absolute;
    top: 100px;
    left: 414px;
    color: var(--number-tipe-two);
    font-size: 45px;

    opacity: 0.8;
}

.cy {
    position: absolute;
    top: 28px;
    left: 594px;
    color: var(--number-tipe-two);
    font-size: 65px;

    opacity: 0.6;
}

.cz {
    position: absolute;
    top: 19px;
    left: 464px;
    color: var(--number-tipe-two);
    font-size: 80px;

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


@media screen and (max-width: 1210px) {

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