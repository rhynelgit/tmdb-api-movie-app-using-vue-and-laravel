import { axios } from '../../helper';

const MovieSingle = {
	namespaced: true,
	state: {
		pageLoading: '',
		movie: {},
		hasError: false,
		errorMessage: ''
	},
	mutations: {
		setLoading(state, data){
			state.pageLoading = data
		},
		setResult(state, data){
			state.movie = data
		},
		setError(state, data){
			state.hasError = data
		},
		setErrorMessage(state, data){
			state.errorMessage = data
		},
	},
	actions: {
		fetch({ commit }, id) {
			commit('setLoading', true)

			axios
				.get(`api/movie/${id}`)
				.then(res => {
					commit('setLoading', false)
					commit('setResult', res.data)
					commit('setError', false)
				})
				.catch(
					error =>  {
						commit('setLoading', false)
						commit('setError', true)
						commit('setErrorMessage', error)
					}
				)
		}
	}
}

export default MovieSingle