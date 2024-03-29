<!DOCTYPE html>
<html lang="tr" style="background: #1a1a1a">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html {
  font-size: 24px;
  color: rgb(255, 255, 255);
  font-family: 'Heebo', sans-serif;
  /* font-family: "Source Sans Pro", sans-serif; */
  background-color: #ffffff;
}
.front-side,
.back-side {
  width: 100%;
  height: 890px;
  display: grid;
  grid-template-columns: 2% 96% 2%;
  grid-template-rows: 4% 92% 4%;
  position: relative;
  margin: 20px auto;
  overflow: hidden;
  box-shadow: 2px 5px 15px 0px #17161694;
  background-color: #122530;
}
.color-grid {
  display: grid;
  grid-template-columns: repeat(3, 150px);
  grid-template-rows: repeat(8, 50px);
  grid-gap: 8px;
  width: 150px;
  height: 400px;
  transform: rotate(-45deg);
}
.black {
  background-color: #343536;
  grid-column: 2 / span 2;
  grid-row: 1 / span 3;
}
.red1 {
  background-color: #e45e4f;
  grid-row: 2 / span 5;
}
.red2 {
  background-color: #e45e4f;
  grid-column: 2 / span 2;
  grid-row: 4/7;
}
.green {
  background-color: #007e67;
  grid-column: 2/4;
  grid-row: 7/9;
}

.info-grid {
  grid-column: 2/3;
  grid-row: 2/3;
  z-index: 2;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.363);
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.432);
  border-radius: 6px;
  font-size: 0.7rem; /*12px;*/
  display: grid;
  grid-template-columns: 15px repeat(3, 1fr) 15px;
  grid-template-rows: repeat(3, 1fr);
  line-height: 1px;
}
.info-grid .name {
  grid-column: 2 / span 2;
  grid-row: 1 / span 1;
  font-size: 1.2em;
  letter-spacing: .1rem;
  margin-top: 8px;
}
.info-grid .name h5{
  font-weight: unset;
}
.info-grid .addr {
  grid-column: 2 / span 2;
  grid-row: 3;
}

.info-grid .phoneNo {
  grid-column: 3 / span 2;
  grid-row: 2;
  text-align: end;
}
.info-grid .emailId {
  grid-column: 3 / span 2;
  grid-row: 3;
  text-align: end;
  font-size: 1.1em;
}

.back-side .name-tag {
  grid-column: 1 / span 4;
  grid-row: 2 / span 1;
  align-self: center;
  z-index: 2;
  width: 100%;
  height: 15%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: rgba(255, 255, 255, 0.363);
  box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.288);
  font-size: 0.6rem; /*12px;*/
  letter-spacing: .1rem;
  text-align: center;
}
.name-tag h1,h3{
  margin: 2px;
  font-weight: unset;
}
.credits{
  margin-top:40px;
  text-align: center;
  color: #343536;
}

</style>
</head>

<body >
    <div class="back-side">
        <div class="color-grid">
            <div class="black"></div>
            <div class="red1"></div>
            <div class="red2"></div>
            <div class="green"></div>
        </div>
        <div class="name-tag">
            <h1>
                <strong>LENORA BİLİŞİM</strong>
            </h1>
            <h3>FONKERA REST API SERVER</h3>

        </div>
        
    </div>
    
</body>
</html>