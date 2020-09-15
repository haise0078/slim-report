<template>
  <div>
    <v-container>
      <v-row justify="center">
        <v-col cols="4">
          <v-menu
            ref="menu"
            :close-on-content-click="false"
            :return-value.sync="date"
            transition="scale-transition"
            offset-y
            min-width="290px"
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="date"
                label="提出日"
                readonly
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker v-model="date" no-title scrollable>
              <v-spacer></v-spacer>
              <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
              <v-btn text color="primary" @click="$refs.menu.save(date)"
                >OK</v-btn
              >
            </v-date-picker>
          </v-menu>
        </v-col>
      </v-row>
    </v-container>
    <v-container v-for="(report, index) in reportList" :key="index">
      <v-card>
        <v-row>
          <v-col cols="4" sm="2">
            <v-select
              v-model="report.taskLength"
              :items="hoursList"
              label="時間"
              class="mx-2"
            ></v-select>
          </v-col>
          <v-col cols="4" sm="2">
            <v-select
              v-model="report.taskType"
              :items="typeList"
              class="mx-2"
            ></v-select>
          </v-col>
          <v-col cols="4" sm="8">
            <v-textarea
              v-model="report.taskExplanation"
              class="mx-2"
              label="内容"
              rows="1"
            ></v-textarea>
          </v-col>
        </v-row>
        <button @click="addRecord">追加</button>
      </v-card>
    </v-container>
    <button @click="submitReport">送信</button>
  </div>
</template>

<script>
const maxHour = 12
const hourRange = [...Array(maxHour).keys()]
  .map((x) => x / 2)
  .map((x) => {
    const hh = ('00' + Math.floor(x)).slice(-2)
    const mm = ('00' + (x - Math.floor(x)) * 60).slice(-2)
    return hh + ':' + mm + ':' + '00'
  })
export default {
  data() {
    return {
      reportList: [],
      typeList: ['study', 'game', 'meal'],
      hoursList: hourRange,
      date: new Date().toISOString().substr(0, 10),
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
        taskExplanation: '',
        taskType: this.typeList[0],
        taskLength: this.hoursList[0],
        reportDate: this.date,
      }
    },
    submitReport() {
      const response = this.$axios
        .$post(`/daily-report`, this.reportList)
        .then(function (response) {
          console.log(response)
        })
    },
  },
}
</script>
