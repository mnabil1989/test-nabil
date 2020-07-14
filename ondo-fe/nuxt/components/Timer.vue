<template>
  <div class="base-timer">
    <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
      <g class="base-timer__circle">
        <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45" />
        <path
          id="base-timer-path-remaining"
          stroke-dasharray="283"
          class="base-timer__path-remaining"
          :class="remainingPathColor"
          d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
        />
      </g>
    </svg>
    <span id="base-timer-label" class="base-timer__label">{{formatTime(timeLeft)}}</span>
  </div>
</template>

<script>
export default {
  props: ["timeinSeconds"],

  mounted() {
    this.startTimer();
  },
  data() {
    return {
      FULL_DASH_ARRAY: 283,
      WARNING_THRESHOLD: 10,
      ALERT_THRESHOLD: 5,
      COLOR_CODES: {
        info: {
          color: "green"
        },
        warning: {
          color: "orange",
          threshold: 10
        },
        alert: {
          color: "red",
          threshold: 5
        }
      },
      TIME_LIMIT: 900,
      timePassed: 0,
      timeLeft: 900,
      timerInterval: null,
      remainingPathColor: "green"
    };
  },
  methods: {
    onTimesUp() {
      clearInterval(this.timerInterval);
    },
    startTimer() {
      this.timerInterval = setInterval(() => {
        this.timePassed = this.timePassed += 1;
        this.timeLeft = this.TIME_LIMIT - this.timePassed;
        document.getElementById("base-timer-label").innerHTML = this.formatTime(
          this.timeLeft
        );
        this.setCircleDasharray();
        this.setRemainingPathColor(this.timeLeft);

        if (this.timeLeft === 0) {
          this.onTimesUp();
        }
      }, 1000);
    },

    formatTime(time) {
      const minutes = Math.floor(time / 60);
      let seconds = time % 60;

      if (seconds < 10) {
        seconds = `0${seconds}`;
      }

      return `${minutes}:${seconds}`;
    },

    setRemainingPathColor(timeLeft) {
      const { alert, warning, info } = this.COLOR_CODES;
      if (timeLeft <= alert.threshold) {
        document
          .getElementById("base-timer-path-remaining")
          .classList.remove(warning.color);
        document
          .getElementById("base-timer-path-remaining")
          .classList.add(alert.color);
      } else if (timeLeft <= warning.threshold) {
        document
          .getElementById("base-timer-path-remaining")
          .classList.remove(info.color);
        document
          .getElementById("base-timer-path-remaining")
          .classList.add(warning.color);
      }
    },

    calculateTimeFraction() {
      const rawTimeFraction = this.timeLeft / this.TIME_LIMIT;
      return rawTimeFraction - (1 / this.TIME_LIMIT) * (1 - rawTimeFraction);
    },

    setCircleDasharray() {
      const circleDasharray = `${(
        this.calculateTimeFraction() * this.FULL_DASH_ARRAY
      ).toFixed(0)} 283`;
      document
        .getElementById("base-timer-path-remaining")
        .setAttribute("stroke-dasharray", circleDasharray);
    }
  }
};
</script>

<style scoped>
.base-timer {
  position: relative;
  width: 200px;
  height: 200px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 200px;
  height: 200px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
}
</style>