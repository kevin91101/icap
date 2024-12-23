<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>kevin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/myall.css">
</head>
<body>
    <div class="container py-5" id="app">
        <div class="display-4 fw-900 text-center text-bg-secondary my-3 py-2">{{ title }}</div>
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                        <tr>
                            <th>編號</th>
                            <th>帳號</th>
                            <th>密碼</th>
                            <th>Email</th>
                            <th>興趣</th>
                            <th>註冊時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, key) in memberData">
                            <td>{{ item.ID }}</td>
                            <td>{{ item.Username }}</td>
                            <td>{{ item.Password }}</td>
                            <td>{{ item.Email }}</td>
                            <td>{{ item.Interest }}</td>
                            <td>{{ item.Created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/vue.global.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script>
        const App = {
            data() {
                return {
                    title: "會員資料",
                    memberData: [], //會員資料
                }
            },
            created() {
                //載入會員資料
                const vm = this;
                $.ajax({
                    type: "GET",
                    url: "http://localhost:8080/icap/icap/vue/20241223table_api.php",
                    dataType: "json",
                    success: function(data){
                        console.log(data);
                        vm.memberData = data;
                    },
                    error: function(){
                        console.log("error-http://localhost:8080/icap/icap/vue/20241223table_api.php");
                    }
                });
            }
        }
        Vue.createApp(App).mount("#app");
    </script>
</body>
</html>