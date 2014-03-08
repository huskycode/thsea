var application = {
    youtubeApiKey: 'AIzaSyCw656xQqDzjKeMYvxStCZ8mg17OoVW-Mo',
    utility: {
        getVideoInfo: function(videoId) {
            var gdataUrl = "https://www.googleapis.com/youtube/v3/videos?id=" + videoId + "&key=" + application.youtubeApiKey + "&part=snippet";
            var videoInfo = null;

            jQuery.ajax({
                url: gdataUrl,
                type: "GET",
                dataType: 'json',
                async: false,
                success: function(data) {
                    if (data.pageInfo.totalResults === 1) {
                        videoInfo = data.items[0];
                    }
                }
            });
            return videoInfo;
        },
            nl2br: function (str, is_xhtml) {
            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br ' + '/>' : '<br>'; // Adjust comment to avoid issue on phpjs.org display

            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
        }
    }
};
