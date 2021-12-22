export function shuffle (str) {
  const a = str.split('')
  const n = a.length

  for (let i = n - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1))
    const tmp = a[i]
    a[i] = a[j]
    a[j] = tmp
  }
  return a.join('')
}
export function generateReference (lengthOfString = 15) {
  const strResult = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'

  return shuffle(strResult).substr(0, lengthOfString)
}

export function getCorrectDate (date) {
  const rawDate = new Date(date)
  rawDate.setDate(rawDate.getDate() + 1)
  return rawDate
}

export function emptyExperience () {
  return {
    reference: '',
    company: '',
    title: '',
    position: '',
    start_year: '',
    end_year: '',
    till_present: false,
    image_url: '',
  }
}

export function emptyEducation () {
  return {
    reference: '',
    school: '',
    course: '',
    start_year: '',
    end_year: '',
  }
}

export function emptySkill () {
  return {
    reference: '',
    category: '',
    name: '',
    level: 10,
    description: '',
  }
}

export function emptyInterest () {
  return {
    reference: '',
    name: '',
    description: '',
  }
}
