export const state = () => ({

    bookInfo: {
        selectedDate: "",
        selectedTime: "",
        comment: "",
        selectedDoctor: {}
    }
})

export const mutations = {
    setDate(state, date) {
        state.bookInfo.selectedDate = date;
    },
    setTime(state, Time) {
        state.bookInfo.selectedTime = Time;
    },
    setDoctor(state, doctor) {
        state.bookInfo.doctor = doctor;
    },
    setComment(state, comment) {
        state.bookInfo.comment = comment;
    },

}
export const getters = {
    getDate: (state) => {
        return state.bookInfo.selectedDate
    },
    getFormatedDate: (state) => {
        let date = new Date(state.bookInfo.selectedDate);

        let formatedDate = `${date.getFullYear()}-${date.getMonth() + 1 > 10
            ? date.getMonth() + 1
            : "0" + (date.getMonth() + 1)}-${date.getDate() > 10
                ? date.getDate()
                : "0" + (date.getDate())} ${state.bookInfo.selectedTime}:00`;
        return formatedDate
    },
    getTime: (state) => {
        return state.bookInfo.selectedTime
    },
    getdoctor: (state) => {
        return state.bookInfo.doctor
    },
    getComment: (state) => {
        return state.bookInfo.comment
    }
}

export const actions = {
    setSelectedDate({
        commit
    }, date) {
        commit('setDate', date)
    },
    setSelectedTime({
        commit
    }, time) {
        commit('setTime', time)
    }
    , setSelectedDoctor({
        commit
    }, doctor) {
        commit('setDoctor', doctor)
    }
    , setComment({
        commit
    }, comment) {
        commit('setComment', comment)
    }
}
