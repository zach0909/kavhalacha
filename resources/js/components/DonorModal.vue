<template>
    <div class="container flex justify-center mx-auto">
        <div class="absolute inset-0 flex items-center justify-center bg-gray-700 bg-opacity-50">
            <div class="max-w-2xl p-6 bg-white">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl">Donor Details</h3>
                    <div class="cursor-pointer" @click="closeModal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 form">
                    <div class="mb-5">
                        <label for="first_name" class="block font-bold text-gray-600">First Name</label>
                        <input type="text" name="first_name" v-model="donor.first_name"
                               class="w-full p-2 border border-gray-300 rounded-l shadow focus:outline-none focus:ring-2 focus:ring-purple-600"
                               placeholder="Enter First name">
                    </div>
                    <div class="mb-5">
                        <label for="last_name" class="block font-bold text-gray-600">Last Name</label>
                        <input type="text" name="last_name" v-model="donor.last_name"
                               class="w-full p-2 border border-gray-300 rounded-l shadow focus:outline-none focus:ring-2 focus:ring-purple-600"
                               placeholder="Enter First name">
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block font-bold text-gray-600">Email</label>
                        <input type="text" name="email" v-model="donor.email"
                               class="w-full p-2 border border-gray-300 rounded-l shadow"
                               placeholder="Enter Email">
                        <p class="mt-1 text-sm text-red-400">Email field is required!</p>
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="block font-bold text-gray-600">Phone Number</label>
                        <input type="text" name="phone" v-model="donor.phone_number"
                               class="w-full p-2 border border-gray-300 rounded-l shadow"
                               placeholder="Enter Phone Number">
                    </div>
                    <div class="mb-5">
                        <label for="address" class="block font-bold text-gray-600">Address</label>
                        <input type="text" name="address" v-model="donor.address"
                               class="w-full p-2 border border-gray-300 rounded-l shadow"
                               placeholder="Enter Address">
                    </div>
                    <div class="mb-5">
                        <label for="follow_up_calls" class="block font-bold text-gray-600">Follow Up Calls</label>
                        <input type="text" name="follow_up_calls" v-model="donor.follow_up_calls"
                               class="w-full p-2 border border-gray-300 rounded-l shadow"
                               placeholder="Enter number of follow up calls">
                    </div>
                    <div class="mb-5">
                        <label for="status" class="block font-bold text-gray-600">Status</label>
                        <select name="status" v-model="donor.status"
                                class="w-full p-2 border border-gray-300 rounded-l shadow">
                            <option v-for="option in statusOptions" :value="option">{{option}}</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="comments" class="block font-bold text-gray-600">Comments</label>
                        <textarea rows="4" name="comments" v-model="donor.comments"
                               class="w-full p-2 border border-gray-300 rounded-l shadow"
                               placeholder="Enter General Comments" />
                    </div>
                </div>
                <button
                        @click="submit"
                        type="submit"
                        class="block w-full p-3 font-bold text-white bg-blue-500 rounded-l">Submit</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        donorInit: {
            type: Object,
            default: () => {}
        }
    },
    data () {
        return {
            donor: {
                first_name: '',
                last_name: '',
                email: '',
                phone_number: '',
                address: '',
                follow_up_calls: '',
                status: '',
                comments: ''
            }
        }
    },
    computed: {
        statusOptions () {
            return ['Active', 'dead', 'seminary girl', 'bochur', 'No donation', 'Donated', 'Not now', 'No answer']
        }
    },
    methods: {
        closeModal () {
            this.$emit('hide')
        },
        async submit () {
            const response = await this.$axios.post('/donor', this.donor)
            const json = await response.json()
            console.log(json)
            this.$emit('hide')
        }
    },
    mounted() {
        if (this.donorInit) {
            this.donor = this.donorInit
        }
    }
}
</script>

<style>
.form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-column-gap: 3rem;
}
</style>
