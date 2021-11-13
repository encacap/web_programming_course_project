<footer class="px-4 lg:px-10 pt-4 lg:pt-10 bg-gray-100 lg:bg-none">
    <div class="lg:flex">
        <div class="flex justify-between items-center">
            <a href="/" class="flex items-center text-blue-500">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-12">
                        <path d="M9 22h6c5 0 7-2 7-7V9c0-5-2-7-7-7H9C4 2 2 4 2 9v6c0 5 2 7 7 7Z" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="stroke-current"></path>
                        <path
                            d="M15.5 9.75a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM8.5 9.75a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM8.4 13.3h7.2c.5 0 .9.4.9.9 0 2.49-2.01 4.5-4.5 4.5s-4.5-2.01-4.5-4.5c0-.5.4-.9.9-.9Z"
                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"
                            class="stroke-current"></path>
                    </svg>
                </div>
                <div class="ml-4  uppercase text-blue-500">
                    <div class="mt-1 font-semibold text-xs">Bài tập lớn</div>
                    <div class="font-bold text-xl">Nhóm Đỗng</div>
                </div>
            </a>
        </div>
        <div class="block lg:hidden w-full h-0.5 bg-gray-200 mt-4"></div>
        <div class="flex-1 lg:flex justify-end items-center mt-4 lg:mt-0">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-12 lg:w-auto mr-4 lg:mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-7 lg:w-9 mx-auto">
                        <path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10ZM20.59 22c0-3.87-3.85-7-8.59-7s-8.59 3.13-8.59 7"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm">1851120007</div>
                    <div class="font-semibold">Nguyễn Tấn Ngọc Đỗng</div>
                </div>
            </div>
            <div class="flex items-center mt-3 lg:mt-0 lg:ml-16">
                <div class="flex-shrink-0 w-12 lg:w-auto mr-4 lg:mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-7 lg:w-9 mx-auto">
                        <path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10ZM20.59 22c0-3.87-3.85-7-8.59-7s-8.59 3.13-8.59 7"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm">1851120020</div>
                    <div class="font-semibold">
                        Nguyễn Khắc Khánh
                    </div>
                </div>
            </div>
            <div class="flex items-center mt-3 lg:mt-0 lg:ml-16">
                <div class="flex-shrink-0 w-12 lg:w-auto mr-4 lg:mr-6">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-7 lg:w-9 mx-auto">
                        <path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10ZM20.59 22c0-3.87-3.85-7-8.59-7s-8.59 3.13-8.59 7"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </div>
                <div>
                    <div class="text-sm">1851120044</div>
                    <div class="font-semibold">
                        Trần Minh Tân
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t-2 mt-4 lg:mt-10 py-4 text-center">
        Copyrights © 2021. All rights reserved by
        <a href="https://www.facebook.com/khackhanh.encacap/" class="font-semibold">Nhóm Đỗng</a>
    </div>
</footer>
<script src="./assets/js/home.min.js"> </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
function addCart(productId, num) {
    $.post('api/ajax_request.php', {
        'action': 'cart',
        'id': productId,
        'num': num
    }, function(data) {
        location.reload()
    })
}
</script>

</body>

</html>