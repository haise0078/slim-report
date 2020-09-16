<template>
  <v-container>
    <h1>{{ message }}</h1>
  </v-container>
</template>

<script>
export default {
  asyncData({ $axios, params }) {
    return $axios.$get(`http://back:8080/test`).then((res) => {
      return { message: res.message }
    })
  },
}
</script>
