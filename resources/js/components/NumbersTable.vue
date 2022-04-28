<template>
    <div>
        <div class="text-gray-900 bg-gray-200">
            <div class="p-4 flex">
                <h1 class="text-3xl">
                    Numbers
                </h1>
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
                    <tr v-for="number in numbers" class="border-b hover:bg-orange-100 bg-gray-100">
                        <td class="p-3 px-5">{{`${number.first_name} ${number.last_name}`}}</td>
                        <td class="p-3 px-5">{{number.email}}</td>
                        <td class="p-3 px-5">{{number.status}}</td>
                        <td class="p-3 px-5">{{number.last_four}}</td>
                        <td class="p-3 px-5 flex justify-end"><button type="button" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" @click="handleEditClick(donor)">Edit</button><button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
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
        numbers: {
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
            this.$emit('selectedNumber', donor)
        }
    },
    mounted () {
    }
}
</script>
