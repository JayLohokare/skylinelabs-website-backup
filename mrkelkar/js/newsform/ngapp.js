newsFormApp = angular.module('newsFormApp', ['ngFileUpload', 'ngResource'])
    .controller('newsFormController', function ($scope, Upload, FormService, $http) {

        var timestamp = Date.now();
        var img_upload_url = "http://127.0.0.1:3000/img/" + timestamp;
        $scope.submit = function () {
            console.log('Inside');

            var multi_imgs = false;

           //console.log("main file " + $scope.filemain.fieldname );
           //return;

            //console.log("\n1 " + $scope.form.file + '\n2' + $scope.file + '\n3' + $scope.headline + '\n4' + $scope.content);
            if ($scope.filemain && $scope.headline && $scope.content && $scope.short_description) {
                var mainfileprops = $scope.filemain.name.match(/([^:\\/]*?)(?:\.([^ :\\/.]*))?$/);
                $scope.upload($scope.filemain);
                if ($scope.filesupp) {
                    multi_imgs = true;
                    $scope.uploadFiles($scope.filesupp);
                }


                var supp_imgs = [String];

                if (multi_imgs) {
                    var suppimgprops;
                    for (var i = 0; i < $scope.filesupp.length; i++) {
                        console.log('adding to array ' + $scope.filesupp[i].name);
                        suppimgprops = $scope.filesupp[i].name.match(/([^:\\/]*?)(?:\.([^ :\\/.]*))?$/);
                        supp_imgs[i] = "file-" + suppimgprops[1] + "-" + timestamp + "." + suppimgprops[2];
                        console.log("now " + supp_imgs[i]);
                    }
                }

                var postObj = {
                    "headline": $scope.headline,
                    "content": $scope.content,
                    "short_description": $scope.short_description,
                    "tagstring": $scope.tagstring,
                    "main_img": "file-" + mainfileprops[1] + "-" + timestamp + "." + mainfileprops[2],
                    "supp_imgs": supp_imgs,
                    "timestamp": timestamp
                };

                console.log(postObj);


                $http.post('http://127.0.0.1:3000/api/addnewscardinfo', postObj)
                    .success(function (data, status, headers, config) {
                        console.log('Data sent successfully');
                        console.log(data);
                    })
                    .error(function (data, status, headers, config) {
                        console.log('Data NOT sent successfully');
                    });


                console.log("Uploaaaade");
                $scope.username = "Parag";
            }
        }
        $scope.upload = function (file) {

            Upload.upload({
                url: img_upload_url,
                data: {file: file, testkey: "value"}
            }).then(function (resp) {
                console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);


            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
            });

            // for multiple files:

            $scope.uploadFiles = function (files) {
                console.log("Multiple hai");
                if (files && files.length) {
                    for (var i = 0; i < files.length; i++) {
                        Upload.upload({url: img_upload_url, data: {file: files[i]}});
                        console.log("Sent 1");
                    }
                    // or send them all together for HTML5 browsers:
                    //Upload.upload({data: {file: files}});
                }
            }
        }
    })