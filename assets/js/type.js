$.ajax({
    url: '/PersonalityTest/rest/types/',
    type: 'GET',
    success: function(data) {
        console.log(data);
        $.each(data, function(index, jobType) {
            let imageDiv = `<div class="col-md-4 order-md-${(index % 2 === 0) ? 'last' : 'first'}" data-aos="fade-${(index % 2 === 0) ? 'right' : 'left'}">
                              <img src="assets/img/details-${index % 4 + 1}.png" class="img-fluid" alt="${jobType.name}">
                            </div>`;

            let responsibilities = jobType.responsibilities.split(';').map(responsibility => `<li><i class="bi bi-check"></i> ${responsibility.trim()}</li>`).join('\n    ');
            let requirements = jobType.requirements.split(';').map(requirement => `<li><i class="bi bi-check"></i> ${requirement.trim()}</li>`).join('\n    ');

            let textDiv = `<div class="col-md-8 pt-4" data-aos="fade-up">
                             <h3>${jobType.name}</h3>
                             <p class="fst-italic">${jobType.description}</p>
                             <p class="fst-italic">Responsibilities:</p>
                             <ul>
                                ${responsibilities}
                             </ul>
                             <p class="fst-italic">Requirements:</p>
                             <ul>
                                ${requirements}
                             </ul>
                           </div>`;

            let section = `<section id="${jobType.name.toLowerCase().split(' ').join('')}" class="details">
                             <div class="container">
                               <div class="row content">
                                 ${textDiv}
                                 ${imageDiv}
                               </div>
                             </div>
                           </section>`;

            $('#TypesDiv').append(section);
        });
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(`Error: ${textStatus}, ${errorThrown}`);
    }
});
