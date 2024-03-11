<template>
  <section class="user">
    <div class="top-list">
      <h1>Панель администратора</h1>
    </div>
    <div class="menu-user">
      <router-link to="/adminsch" class="personal">Изменение расписания</router-link>
    </div>
    <form action="/makeDate" method="post" class="personal-data" enctype="multipart/form-data">
      <input type="hidden" name="_token" :value="codeToken">
      <h2 style="margin: 0">Изменение расписания</h2>
      <select name="doctor_id" id="doctor_id" v-on:change="changeDoctor">
        <option value="1">Ермолова Любовь Давидовна</option>
        <option value="2">Марков Алексей Алексеевич</option>
        <option value="3">Игнатова Нина Серафимовна</option>
        <option value="4">Быков Артём Даниилович</option>
        <option value="5">Ильина Владислава Владиславовна</option>
        <option value="6">Петров Арсений Артёмович</option>
      </select>
      <input type="text" name="date" placeholder="Дата недели" onfocus="(this.type='date')">
      <input type="submit" value="Добавить дату">
    </form>
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
      times: []
    }
  },
  mounted(){
    axios.get('/getAllDoctors').then(response => {this.doctors = response.data})
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
    }
  }
})
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

.personal-data{
  display: flex;
  flex-direction: column;
  gap: 19px;
  align-items: center;
}
.personal-data input, select{
  width: 567px;
  background-color: #ffffff;
  color: #7A8FAD;
  border: none;
  box-shadow: 0 1px 1px 0 rgb(155, 155, 155);
  border-radius: 6px;
  font-size: 20px;
  padding:14px 30px;
}
.personal-data select{
  width: 627px;
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
</style>