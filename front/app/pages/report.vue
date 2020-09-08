<template>
  <div>
    <v-container v-for="(report, index) in reportList" :key="index">
      <v-card>
        <v-row>
          <v-col cols="4" sm="2">
            <v-select
              v-model="report.time"
              :items="hoursList"
              label="時間"
              class="mx-2"
            ></v-select>
          </v-col>
          <v-col cols="4" sm="2">
            <v-select
              v-model="report.type"
              :items="typeList"
              class="mx-2"
            ></v-select>
          </v-col>
          <v-col cols="4" sm="8">
            <v-textarea
              v-model="report.content"
              class="mx-2"
              label="内容"
              rows="1"
            ></v-textarea>
          </v-col>
        </v-row>
      </v-card>
    </v-container>
    <button @click="addRecord">追加</button>
  </div>
</template>

<script>
import ReportRecord from '~/components/ReportRecord.vue'
const maxHour = 12
const hourRange = [...Array(maxHour).keys()]

export default {
  data() {
    return {
      reportList: [],
      typeList: ['勉強', 'ゲーム', 'ご飯'],
      hoursList: hourRange,
    }
  },
  created() {
    this.reportList = [this.initReport()]
  },
  methods: {
    addRecord() {
      this.reportList.push(this.initReport())
    },
    initReport() {
      return {
        content: '',
        type: '勉強',
        time: 0,
      }
    },
  },
}
</script>
