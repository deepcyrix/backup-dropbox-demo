<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Admin</title>
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="alert alert-success" role="alert" v-show="success" style="display: none">
                  Post added successfully.
                </div>
                <form action="" class="" v-on:submit.prevent="savePost">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" id="title" name="title" v-model="title">
                    </div>
                    <div class="form-group">
                        <label for="title">Post Content</label>
                        <textarea type="text" class="form-control" id="content" name="content" v-model="content"></textarea>
                    </div>
                    <input type="submit" value="Save Post" id="btn" class="btn btn-primary">
                </form>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <script>
        new Vue({
            el: '#app',
            data: {
                title: "",
                content: "",
                success: false,
            },
            methods: {
                savePost: function () {
                    axios.post('{{route('posts.store')}}', {title: this.title, content: this.content}).then(res => {
                        this.success = true
                        this.title = this.content = ''
                        window.setTimeout(() => this.success = false, 3000)
                    })
                }
            }
        })
        </script>
        {{-- <script>
          $(document).on("click","#btn", function (event) {
            event.preventDefault();
            var content = $('#content').val(),
                title = $('#title').val();
            $.ajax({
              type: "POST",
              dataType: "json",
              url: 'http://api.backup-demo.test/posts',
              data: {
                  content: content,
                  title: title,
                  "_token": "{{ csrf_token() }}",
              },
              success: function (data) {
                console.log("success");
              }

            });
          });
        </script> --}}
    </body>
    </html>