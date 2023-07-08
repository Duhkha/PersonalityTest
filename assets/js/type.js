$.ajax({
    url: '/Dedsec/rest/types/',
    type: 'GET',
    success: function(data) {
        console.log(data);
        $.each(data, function(index, jobType) {
            let imageDiv = `<div class="col-md-4" data-aos="fade-${(index % 2 === 0) ? 'right' : 'left'}">
                              <img src="assets/img/details-${index % 4 + 1}.png" class="img-fluid" alt="${jobType.name}">
                            </div>`;
            
            let textDiv = `<div class="col-md-8 pt-4" data-aos="fade-up">
                             <h3>${jobType.name}</h3>
                             <p class="fst-italic">${jobType.description}</p>
                             <p class="fst-italic">Responsibilities:</p>
                             <ul>
                                <li><i class="bi bi-check"></i> ${jobType.responsibilities}</li>
                             </ul>
                             <p class="fst-italic">Requirements:</p>
                             <ul>
                                <li><i class="bi bi-check"></i> ${jobType.requirements}</li>
                             </ul>
                           </div>`;
            
            let section = `<section id="${jobType.name.toLowerCase().split(' ').join('')}" class="details">
                             <div class="container">
                               <div class="row content">`;
            
            if (index % 2 === 0) {
                section += `${imageDiv}${textDiv}`;
            } else {
                section += `${textDiv}${imageDiv}`;
            }

            section +=     `</div>
                           </div>
                         </section>`;

            $('#TypesDiv').append(section);
        });
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(`Error: ${textStatus}, ${errorThrown}`);
    }
});
