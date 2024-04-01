<template>
  <section class="user">
    <div class="top-list">
      <h1>Администратор</h1>
      <a href="/logout" class="logout">Выход</a>
    </div>
    <div class="menu-user">
      <router-link to="/adminsch" class="personal">Расписание</router-link>
      <router-link to="/admintic" class="personal select">Записи на прием</router-link>
      <router-link to="/admindoc" class="personal">Добавить врача</router-link>
    </div>
    <div class="sort">
      <h2 class="title">Записи на прием</h2>
      <form action="" method="get" class="sort-block">
        <div class="form-group">
          <p class="head">Выберите специализацию</p>
          <select name="type_id" v-on:change="changeType">
            <option value="1">Терапевт</option>
            <option value="2">Гинеколог</option>
            <option value="3">Кардиолог</option>
            <option value="4">Гастроэнтеролог</option>
            <option value="5">Хирург</option>
            <option value="6">Вирусолог</option>
          </select>
        </div>
        <div class="form-group">
          <p class="head">ФИО Врача</p>
          <select class="doctor_id">
            <option :value="doctor['id']" v-for="doctor in doctors">{{doctor['full_name']}}</option>
          </select>
        </div>
        <button type="button" class="submit" v-on:click="sortDoctors">Показать</button>
      </form>
    </div>
    <div class="records_table">
      <div class="row">
        <p class="header" style="width: 30px">№</p>
        <p class="header header-big">ФИО</p>
        <p class="header" style="width: 50px;">Дата</p>
        <p class="header" style="width: 70px;">Время</p>
        <p class="header header-big">Пациент</p>
        <p class="header" style="width: 120px;">Телефон</p>
      </div>
      <div class="row" v-for="(record, index) in records" style="margin-bottom: 19px">
        <p class="content" style="width: 30px">{{index + 1}}</p>
        <p class="content header-big">{{record['doctor_name']}}</p>
        <p class="content" style="width: 50px;">{{record['date'].split('-')[2] + '.' + record['date'].split('-')[1]}}</p>
        <p class="content" style="width: 70px;">{{record['time']}}</p>
        <p class="content header-big">{{record['user_name']}}</p>
        <p class="content" style="width: 120px;">{{record['user_number']}}</p>
        <a :href="`/reject/${record['id']}`" class="reject">Отменить</a>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import {defineComponent} from 'vue'
import axios from "axios";

export default defineComponent({
  data() {
    return {
      codeToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      doctors: [],
      doctorId: '',
      dates: [],
      times: [],
      records: []
    }
  },
  mounted(){
    axios.get(`/getDoctorWithType/1`).then(response => {this.doctors = response.data})
    axios.get('/getAllRecords').then(response => {this.records = response.data})
  },
  methods: {
    changeDoctor() {
      this.$route.params.dateId = ''

      this.doctorId = document.querySelector('#user_id').value
      this.times = []

      axios.get(`/getDates/${this.doctorId}`).then(response =>
      {
        this.dates = response.data

        this.dates.forEach((v, k) => {

          this.dates[k]['day'] = v['date'].split('-')[2]
          this.dates[k]['month'] = v['date'].split('-')[1]
        })
      })
    },
    changeDate(id) {
      axios.get(`/getDateInfo/${id}`).then(response => {this.times = response.data})
    },
    changeType(e){
      let current = e.target
      let typeId = current.value

      axios.get(`/getDoctorWithType/${typeId}`).then(response => {this.doctors = response.data})
    },
    sortDoctors(){
      let doctorsSelect = document.querySelector('.doctor_id')
      let doctorId = doctorsSelect.value

      if(doctorId){
        axios.get(`/getAllRecordsWithDoctor/${doctorId}`).then(response => {this.records = response.data})
      }
    }
  }
})
</script>

<style scoped>
p{
  margin: 0;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 24px;
}

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
  color: #7A8FAD;
  text-decoration: none;
  font-size: 18px;
}

.user .menu-user .select{
  color: #719FE7;
}

.user .personal-data .titles p{
  margin: 0;
}
.user .personal-data .data p{
  margin: 0;
}

.top-list{
  display: flex;
  gap: 41px;
  align-items: center;
}

.personal-data input, select{
  background-color: #ffffff;
  color: #7A8FAD;
  border: none;
  box-shadow: 0 1px 1px 0 rgb(155, 155, 155);
  border-radius: 11px;
  font-size: 20px;
  padding: 16px 0 16px 26px;
  width: 350px;
}

.personal-data input{
  width: 324px;
}

.personal-data input[type='submit']{
  background-color: #80B4FF;
  color: white;
  font-weight: bold;
  font-size: 20px;
  width: 256px;
  border-radius: 64px;
  margin-top: 20px;
  padding: 15px 23px;
}

.top-list .logout{
  text-decoration: none;
  font-family: 'Inter', sans-serif;
  font-size: 22px;
  font-weight: 500;
  color: #0F2B56;
}

.user .records_table{
  width: 1300px;
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

.user .sort{
  margin-top: 48px;
  display: flex;
  flex-direction: column;
  gap: 19px;
}

.user .sort .sort-block{
  display: flex;
  gap: 41px;
  align-items: flex-end;
}

.user .sort .sort-block .form-group{
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.user .sort .sort-block .submit{
  width: 221px;
  border-radius: 64px;
  border: none;
  color: #ffffff;
  padding: 15px 0;
  font-family: 'Inter', sans-serif;
  font-size: 20px;
  font-weight: bold;
  background: linear-gradient(270deg, #80B4FF 0%, #80B4FF 30.38%, #80B4FF 100%);
  box-shadow: 0 -1px 1px 0 rgba(33, 106, 210, 1) inset;
}

.user .sort .sort-block .form-group select{
  color: #0F2B56;
}

.user .sort .sort-block .form-group .head{
  margin: 0;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 20px;
  color: #7A8FAD;
}

.user .sort .title{
  margin: 0;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  font-size: 24px;
  color: #0F2B56;
}

.reject{
  width: 174px;
  border-radius: 64px;
  border: none;
  color: #ffffff;
  padding: 9px 0;
  font-family: 'Inter', sans-serif;
  font-size: 20px;
  font-weight: bold;
  background: linear-gradient(270deg, #80B4FF 0%, #80B4FF 30.38%, #80B4FF 100%);
  box-shadow: 0 -1px 1px 0 rgba(33, 106, 210, 1) inset;
  text-decoration: none;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>