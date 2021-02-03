<template>
  <div id="app">
      <table1></table1>
  </div>
</template>

<script>

import table1 from './components/table';

export default {
  name: 'App',
  components: {
    table1
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
