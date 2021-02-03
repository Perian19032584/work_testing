<template>
  <div class="container">

    <form>
      <div class="form-row align-items-center">
        <input type="text" class="form-control col-10" v-model="search_field" placeholder="Введите что вы ищите..">
        <div class="col-auto my-1">
          <div class="custom-control custom-checkbox mr-sm-2">
            <input type="checkbox" class="custom-control-input" id="customControlAutosizing" @change="hide_button" checked>
            <label class="custom-control-label" for="customControlAutosizing">Скрывать строки</label>
          </div>
        </div>
      </div>
    </form>
    <br>

    <table class="table table-dark">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Имя</th>
          <th scope="col">Фамилия</th>
          <th scope="col">Возраст</th>
          <th scope="col">Город</th>
          <th scope="col">Телефон</th>
          <th scope="col">Цена</th>
          <th scope="col">Что продает</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in filteredList" :key="item.id" :class="item.css">
          <th scope="row">{{ item.id }}</th>
          <td>{{ item.name }}</td>
          <td>{{  item.surname  }}</td>
          <td>{{ item.age }}</td>
          <td>{{ item.town }}</td>
          <td>{{ item.telephone }}</td>
          <td>{{ item.price }}</td>
          <td>{{ item.what_sells }}</td>
        </tr>
        </tbody>
      </table>


  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'table1',
  data(){
    return {
      table_data: [],
      search_field: "",
      hide_button_teg: true,
    }
  },
  mounted() {
    axios.get("http://localhost:3000/posts").then(res => {
      this.table_data = res.data;
    });
  },
  computed:{
    filteredList: function(){

      //var thiss = this;

      var comp = this.search_field.toLowerCase();
      var check = this.hide_button_teg;

      return this.table_data.filter(function (elem) {
        if(comp === ''){//При пустом варианте просто показывает всё
          elem.css = "";
          return true;
        }
        else{
          if(check === true){
            return elem.what_sells.toLowerCase().indexOf(comp) > -1;
          }
          else{
            elem.css = "";
            if(elem.what_sells.toLowerCase().indexOf(comp) > -1){
              elem.css = "bg-primary";
            }

             return elem.what_sells;
          }
        }
      })
    }
  },
  methods: {
    hide_button(){
      if(this.hide_button_teg == true) {
        this.hide_button_teg = false;
      }
      else{
        this.hide_button_teg = true;
      }
    }
  }
}

</script>