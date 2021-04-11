import { axios } from '../../helper'

const Movies = {
	namespaced: true,
	state: {
		pageLoading: '',
		page: 1,
		movies: [],
		total_pages: 0,
		total_results: 0,
		hasError: false
	},
	mutations: {
		setLoading(state, data){
			state.pageLoading = data
		},
		setPage(state, data){
			state.page = data
		},
		setResults(state, data){
			state.movies = data
		},
		setTotalPages(state, data){
			state.total_pages = data
		},
		setTotalResults(state, data){
			state.total_results = data
		},
		setError(state, data){
			state.hasError = data
		},
		setErrorMessage(state, data){
			state.errorMessage = data
		},
	},
	actions: {
		fetch({ commit }, page) {
			commit('setLoading', true)

			axios
				.get(`api/discover/movie/popular/${page}`)
				.then(res => {
					commit('setLoading', false)
					commit('setPage', res.data.page)
					commit('setResults', res.data.results)
					commit('setTotalPages', res.data.total_pages)
					commit('setTotalResults', res.data.total_results)
				})
				.catch(
					error =>  {
						commit('setLoading', false)
						commit('setError', true)
						commit('setErrorMessage', error)
					}
				)
		},
	}
}

export default Movies