Management
* ﻿﻿Log in and Log out  ------- DONE
* Register  ------- DONE
* Admin 
* Dashboard 

User Dashboard
* ﻿﻿Lost and Found Module 
* ﻿﻿Adoption Module ------- DONE
     * Adoption Form  ------- DONE
* ﻿﻿Fur Parent Community   ------- DONE
* ﻿﻿About  ------- DONE
* ﻿﻿Profile 
* ﻿﻿Request Ticket   ------- DONE

Admin Dashboard
* Lost and Found ------- DONE
* Adoption ------- DONE
* Ticketing(adopt, lost and req)  ------- DONE

Dog Management ( Lost & Adoption and Adoption)

Admin
* ﻿﻿Add Dog ------- DONE
* ﻿View   ------- DONE
* ﻿﻿Update   ------- DONE
* ﻿Delete  ------- DONE


Community Module- Admin
* ﻿Add ------- DONE
* ﻿﻿Delete ------- DONE
* ﻿﻿Reply ------- DONE

Community Module- User
* ﻿﻿Add ------- DONE
* ﻿﻿Edit 
* ﻿﻿Delete ------- DONE
* ﻿﻿Reply ------- DONE

Request Of Round for dogs- User
* ﻿﻿Send request
Request of Rounds for Dogs- Admin
* ﻿View ﻿


How to run:

1. clone the github repo  "https://github.com/eeuuggeenneee/paws_haven"

2. go to roon folder

3. install dependencies "composer install"

4. migrate the tables "php artisan migrate"

5. link the storage "php artisan storage:link"

6. seed the factory users "php artisan db:seed"

7. install npm packages "npm install"

8. install broadcasting "php artisan install:broadcasting"

9. install reverb "php artisan reverb:install" and add this to env "BROADCAST_CONNECTION=pusher"

10. run the project "php artisan serve"

11. on other terminal "npm run dev" 

10. Turn on the web socket for fur community "php artisan reverb:start"
