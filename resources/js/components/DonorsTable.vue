<template>
    <div>
        <div class="text-gray-900 bg-gray-200">
            <div class="p-4 flex justify-between">
                <h1 class="text-3xl">
                    Donors
                </h1>
                <div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" @click="openModal">Add Donor</button>
                </div>
            </div>
            <div class="px-3 py-4 flex justify-center">
                <table class="w-full text-md bg-white shadow-md rounded mb-4">
                    <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Name</th>
                        <th class="text-left p-3 px-5">Email</th>
                        <th class="text-left p-3 px-5">Status</th>
                        <th class="text-left p-3 px-5">Last Four</th>
                        <th></th>
                    </tr>
                    <tr v-for="donor in donors" class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5">{{`${donor.first_name} ${donor.last_name}`}}</td>
                        <td class="p-3 px-5">{{donor.email}}</td>
                        <td class="p-3 px-5">{{donor.status}}</td>
                        <td class="p-3 px-5">{{donor.last_four}}</td>
                        <td class="p-3 px-5 flex justify-end">
                            <button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" @click="handleEditClick(donor)">Edit</button>
                            <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: {
        donors: {
            type: Array,
            default: () => []
        },
    },
    data () {
        return {
        }
    },
    methods: {
        handleEditClick(donor) {
            this.$emit('selectedDonor', donor)
        },
        openModal () {
            this.$emit('handleAddDonorClick')
        }
    },
    mounted () {
    }
}
</script>
