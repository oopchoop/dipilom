<template>
  <section class="container">
    <div class="doctors"><h1>Наши врачи</h1>
      <div class="menu">
        <router-link to="/therapist" class="unit">
          <img src="/public/images/Checkup.png" alt="">
          <p>Терапевт</p>
        </router-link>
        <router-link to="/gynecologist" class="unit">
          <img src="/public/images/Uterus.png" alt="">
          <p>Гинеколог</p>
        </router-link>
        <router-link to="/cardiologist" class="unit">
          <img src="/public/images/Heart.png" alt="">
          <p>Кардиолог</p>
        </router-link>
        <router-link to="/gastroenterologist" class="unit">
          <img src="/public/images/Stomach.png" alt="">
          <p>Гастроэнтеролог</p>
        </router-link>
        <router-link to="/surgeon" class="unit">
          <img src="/public/images/SurgeonSkin.png" alt="">
          <p>Хирург</p>
        </router-link>
        <router-link to="/virologist" class="unit">
          <img src="/public/images/Virus.png" alt="">
          <p>Вирусолог</p>
        </router-link>

      </div>
    </div>

  </section>
</template>

<script lang="ts">

</script>

<style scoped>
.container{
  margin: 72px 50px 72px 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;

}
.container .doctors{
  display: flex;
  flex-direction: column;
  align-items: center;
}
.container h1{
  color: #0F2B56;
  font-size: 36px;
  margin: 0 auto;
}
.container .doctors .menu{
  display: flex;
  flex-wrap: wrap;
  gap: 55px;
  margin-top: 45px;
  justify-content: center;
}
.container .doctors .menu .unit{
  background-color: white;
  color: #0F2B56;
  display: flex;
  font-size: 24px;
  align-items: center;
  gap: 40px;
  border: none;
  box-shadow: 0 0 2px rgb(186, 201, 223);
  border-radius: 19px;
  width: 410px;
  padding-left: 35px;
  padding-top: 11px;
  padding-bottom: 11px;
  text-decoration: none;
  font-weight: 500;
}
.container .list-doctors{
  display: flex;
  gap: 13px;
  margin-top: 100px;
  justify-content: center;
}
.container .list-doctors .card{
  background-color: white;
  display: flex;
  flex-direction: column;
  padding: 23px 26px;
  border-radius: 12px;
  box-shadow: 0 1px 1px 0 rgb(155, 155, 155);
}
.container .list-doctors .card .doctor{
  display: flex;
  align-items: center;
  color: #0F2B56;
  gap: 15px;
}
.container .list-doctors .card .doctor .info .name{
  font-size: 18px;
  margin: 0;
}
.container .list-doctors .card .doctor .info .qualification{
  display: flex;
  color: #7A8FAD;
  font-size: 16px;
  gap: 7px;
}
.container .list-doctors .card .doctor .info .qualification p{
  margin: 0;
  padding-top: 6px;
}
.container .list-doctors .card .doctor .info .experience{
  display: flex;
  gap: 4px;
  color: #216AD2;
  opacity: 0.8;
  padding-top: 6px;
}
.container .list-doctors .card .doctor .info .experience p{
  margin: 0;
}
.container .list-doctors .card .record{
  display: flex;
  flex-direction: column;
  margin-top: 20px;
  justify-content: center;
  align-items: center;
  gap: 20px;
}
.container .list-doctors .card .record button{
  border: none;
  border-radius: 64px;
  width: 131px;
  height: 37px;
  font-size: 16px;
  color: white;
  background-color: #719FE7;
  box-shadow: 0 1px 0 1px rgb(33 106 210);
}
.container .list-doctors .card .record .date-time{
  display: flex;
  flex-direction: column;
  gap: 7px;

}
.container .list-doctors .card .record .date-time input{
  width: 79px;
  padding: 6px 18px;
  font-size: 16px;
  border-radius: 6px;
  border: none;
  background-color: #E5EDF9;
  color: #216AD2;
}
.container .list-doctors .card .record .date-time .date{
  display: flex;
  gap: 7px;

}
.container .list-doctors .card .record .date-time .time{
  display: flex;
  gap: 7px;
}
</style>
