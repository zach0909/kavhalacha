<template>
    <div class="container mx-auto">
        <div class="mb-4">
            <TableTabs :options="tabOptions" :selected-option="selectedTab" @optionClick="handleTabSelect"></TableTabs>
            <DonorTable v-if="isDonorTabSelected" :donors="donors" @selectedDonor="handleSelectedDonor" @handleAddDonorClick="showModal = true"></DonorTable>
            <NumbersTable v-else :numbers="numbers" @selectedNumber="handleSelectedNumber"></NumbersTable>
        </div>
        <Paginator :hasPrevPage="hasPrevPage" :hasNextPage="hasNextPage" :currentPage="currentPage" @prevClicked="handlePrevClick" @nextClicked="handleNextClick"></Paginator>
        <div v-if="showModal" class="edit-modal-container">
            <DonorModal :donor-init="selectedDonor" @hide="showModal = false" @submit="saveDonorDetails"></DonorModal>
        </div>
    </div>
</template>

<script>

import DonorTable from "./DonorsTable";
import Paginator from "./Paginator";
import DonorModal from "./DonorModal";
import TableTabs from "./TableTabs";
import NumbersTable from "./NumbersTable";

const DONORS = 'donors'
const NUMBERS = 'numbers'

export default {
    data () {
        return {
            donors: [],
            numbers: [],
            currentPage: 1,
            hasPrevPage: false,
            hasNextPage: false,
            selectedDonor: {},
            showModal: false,
            selectedTab: null
        }
    },
    computed: {
        tabOptions () {
            return [{id: DONORS, name: 'Donors'}, {id: NUMBERS, name: 'Numbers'}]
        },
        isDonorTabSelected () {
            return this.selectedTab && this.selectedTab.id === DONORS
        }
    },
    components: {NumbersTable, TableTabs, DonorModal, Paginator, DonorTable},
    methods: {
        async getDonors (page = this.currentPage) {
            const response = await this.$axios.get(`/api/donors?page=${page}`)
            const {data} = response
            this.donors = data.data
            this.numbers = data.data //todo: take this out and implement correctly
            this.currentPage = data.current_page
            this.hasPrevPage = !!data.links[0].url
            this.hasNextPage = !!data.links[data.links.length - 1].url
        },
        handlePrevClick() {
            this.getDonors(--this.currentPage)
        },
        handleNextClick() {
            this.getDonors(++this.currentPage)
        },
        handleSelectedDonor(donor) {
            this.showModal = true
            this.selectedDonor = donor
        },
        saveDonorDetails(details) {
            console.log(details)
            this.showModal = false
        },
        handleTabSelect(tab) {
            this.selectedTab = tab
        },
        handleSelectedNumber (number) {
            //todo: implement
        }
    },
    created () {
        this.getDonors()
        this.selectedTab = {id: DONORS, name: 'Donors'}
    }
}
</script>

<style>
.edit-modal-container {
    min-width: 50%;
}
</style>
