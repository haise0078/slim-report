<template>
  <v-data-table
    :headers="headers"
    :items="reportLists"
    :items-per-page="5"
    class="elevation-1"
  ></v-data-table>
</template>

<script>
export default {
  asyncData({ $axios, params }) {
    return $axios.$get(`/daily-report/reportLists`).then((res) => {
      return { reportLists: res.data }
    })
  },
  data() {
    return {
      headers: [
        {
          text: '提出日',
          align: 'start',
          value: 'reportDate',
        },
        {
          text: '作業時間',
          value: 'taskLength',
        },
        {
          text: '作業種別',
          value: 'taskType',
        },
        {
          text: '作業説明',
          value: 'taskExplanation',
        },
      ],
    }
  },
}
</script>
