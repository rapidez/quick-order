<div class="bg rounded p-5 flex flex-col max-h-80 lg:max-w-96">
    <div class="font-bold mb-4">@lang('Upload CSV')</div>
    <div class="relative flex border border-dashed rounded bg-white flex-1 flex-col items-center gap-3 text-sm p-2">
        <input
            v-on:change="quickOrder.importCSV"
            type="file"
            class="absolute inset-0 cursor-pointer indent-[100%] opacity-0"
        />
        <div v-if="!quickOrder.fileName" class="flex flex-col flex-1 gap-x-2 text-center p-4 items-center justify-center">
            <x-rapidez::quickorder-csv />
            <div class="text font-medium mt-3">
                @lang('Drag & drop your files here or select them manually.')
            </div>
        </div>
        <div v-else v-cloak>
            @lang('File :file has been successfully uploaded', ['file' => '@{{ quickOrder.fileName }}'])
        </div>
    </div>
</div>