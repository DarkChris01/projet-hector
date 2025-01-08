import axios from "axios";

async function get_associations() {

    const response = await axios.get("/associations",{
        headers:{
            Authorization:'Bearer 18|KYFTu00bXG1H7toF2YZW87tV5NUMDHVbXlrzppQl9b9211c9'
        }
    });
    console.log(response.data);
}

get_associations()