var application = {
    youtubeApiKey: 'AIzaSyCw656xQqDzjKeMYvxStCZ8mg17OoVW-Mo',
            
    utility: {
        getVideoInfo: function(videoId){
            var gdataUrl = "https://www.googleapis.com/youtube/v3/videos?id="+videoId+"&key=" + application.youtubeApiKey +"&part=snippet";
            var videoInfo = null;
            
            jQuery.ajax({
                url: gdataUrl,
                type: "GET",
                dataType: 'json',
                async: false,
                success: function(data) {  
                    if (data.pageInfo.totalResults===1){
                        videoInfo = data.items[0];
                    }                   
                    
                }
              });
            
            return videoInfo;
        }
    }
};
