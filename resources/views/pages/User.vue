<template>
  <section class="user" v-if="!informationUser['isDoctor']">
    <div class="top-list">
      <h1>Личный кабинет</h1>
      <a href="/logout" class="logout">Выход</a>
    </div>
    <div class="menu-user">
      <router-link to="/profile" class="personal">Личные данные</router-link>
      <router-link to="/userrecords" class="records">Записи на прием </router-link>
    </div>
    <div class="personal-data">
      <div class="titles">
        <p class="title">ФИО</p>
        <p class="title">Дата рождения</p>
        <p class="title">Телефон</p>
      </div>
      <div class="data">
        <p class="info">{{ informationUser['full_name'] }}</p>
        <p class="info">{{ informationUser['birthday_str'] }}</p>
        <p class="info">{{informationUser['number']}}</p>
      </div>
    </div>
  </section>
  <section class="user" v-else>
    <div class="top-list">
      <h1>{{ informationUser['full_name'].split(' ')[0] + ' ' + informationUser['full_name'].split(' ')[1][0] + '. ' + informationUser['full_name'].split(' ')[2][0] + '.' }}</h1>
      <a href="/logout" class="logout">Выход</a>
    </div>
    <div class="menu-user">
      <router-link to="/profile" class="personal">Записи на прием </router-link>
    </div>
    <div class="records_table">
      <div class="row">
        <p class="header" style="width: 30px">№</p>
        <p class="header header-big">ФИО</p>
        <p class="header" style="width: 50px;">Дата</p>
        <p class="header" style="width: 70px;">Время</p>
      </div>
      <div class="row" v-for="(date, index) in doctorRecords" style="margin-bottom: 19px">
        <p class="content" style="width: 30px">{{index + 1}}</p>
        <p class="content header-big">{{date['name']}}</p>
        <p class="content" style="width: 50px;">{{date['date'].split('-')[2] + '.' + date['date'].split('-')[1]}}</p>
        <p class="content" style="width: 70px;">{{date['time']}}</p>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import {defineComponent} from "vue";
import axios from "axios";

export default defineComponent(
    {
      data: () => {
        return {
          informationUser: {},
          doctorRecords: []
        }
      },
      mounted() {
        axios.get('user').then(response => {
          this.informationUser = response.data

          let date = new Date(this.informationUser['birthday'])

          let day = date.getDate()
          let strDay = ''
          if (day < 10) strDay = `0${day}`

          let month = date.getMonth() + 1
          let strMonth = ''
          if (month < 10) strMonth = `0${month}`

          let year = date.getFullYear()

          this.informationUser['birthday_str'] = `${strDay}.${strMonth}.${year}`

          if(this.informationUser['isDoctor']) {
            axios.get(`/getActiveDoctorRecords/${this.informationUser['doctor_id']}`).then(resp => {
              this.doctorRecords = resp.data

              console.log(this.doctorRecords)
            })
          }
        })
      }
    }
)
</script>

<style scoped>
.user{
  width: 1440px;
  margin: 72px auto 0 auto;
}
.user h1{
  font-size: 28px;
  color: #0F2B56;
}
.user .menu-user{
  display: flex;
  gap: 44px;
}

.user .menu-user .personal{
  color: #719FE7;
  text-decoration: none;
  font-size: 18px;
}
.user .menu-user .records{
  text-decoration: none;
  color: #7A8FAD;
  font-size: 18px;
}
.user .personal-data{
  display: flex;
  gap: 47px;
  margin-top: 50px;
  padding-bottom: 100px;
}
.user .personal-data .titles{
  display: flex;
  flex-direction: column;
  gap: 26px;
  color: #7A8FAD;
  font-size: 18px;
}
.user .personal-data .titles p{
  margin: 0;
}
.user .personal-data .data p{
  margin: 0;
}
.user .personal-data .data{
  font-size: 20px;
  color: #0F2B56;
  display: flex;
  flex-direction: column;
  gap: 23px;
  font-weight: bold;
}

.top-list{
  display: flex;
  gap: 41px;
  align-items: center;
}

.top-list .logout{
  text-decoration: none;
  font-family: 'Inter', sans-serif;
  font-size: 22px;
  font-weight: 500;
  color: #0F2B56;
}

.user .records_table{
  width: 700px;
  padding: 35px 42px;
  display: flex;
  flex-direction: column;
  gap: 23px;
  background-color: #ffffff;
  margin-top: 24px;
  border-radius: 12px;
  box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.25);

}

.user .records_table .row{
  display: flex;
  gap: 75px;
}

.user .records_table .row .header{
  margin: 0;
  color: #719FE7;
  font-size: 20px;
  font-weight: 400;
}

.user .records_table .row .header-big{
  width: 182px;
}

.user .records_table .row .content{
  margin: 0;
  color: #042555;
  font-size: 18px;
  font-weight: 500;
}
</style>